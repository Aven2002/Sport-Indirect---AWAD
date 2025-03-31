<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Retrieve all existing users
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Delete an user's account
     */
    public function destroy($id)
    {
        try{
            $user = User::find($id);

            if(!$user)
            {
                return response()->json([
                    'message' => "User's account not found"
                ] ,404);
            }

            $user->delete();

            //Success response
            return response()->json([
                'message' => "User's account deleted successfully",
                'account' => $user
            ] ,200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ] ,500);
        }
    }

    /**
     * Sign up a new general user account
     */
    public function store(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'userRole' => 'nullable|string|max:20',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|string|max:30|unique:users,username',
                'password' => 'required|string|min:6|confirmed',
                'dob' => 'nullable|date',
                'security_answers' => 'required|json',
                'profileImg' => 'nullable|string',
            ]);

            // Hash the password before saving
            $validatedData['password'] = bcrypt($validatedData['password']);

            // Set default user role if not provided
            if (!isset($validatedData['userRole'])) {
                $validatedData['userRole'] = 'User';
            }

            // Create the user
            $user = User::create($validatedData);

            return response()->json([
                'message' => "User account created successfully",
                'user' => $user
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function submitForm(Request $request)
    {
        $request->validate([
            'first_name' => 'required|regex:/^\w{3,}$/',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{6,}$/'
            ],
            'security_question' => 'required',
            'security_answer' => 'required|min:3'
        ]);

        // Redirect to login page with success message
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    /**
     * Redirect user to login view
     */
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username_or_email' => 'required',
            'password' => 'required'
        ]);

        // Simulating a login attempt (No database authentication in this example)
        if ($request->username_or_email === "testuser" && $request->password === "Test@123") {
            return redirect('/')->with('success', 'Login Successful!');
        } else {
            return back()->with('error', 'Invalid username/email or password.');
        }
    }
    
}
