<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function showForm()
    {
        $securityQuestions = [
            "What is your favorite color?",
            "What is your mother's maiden name?",
            "What was the name of your first pet?"
        ];
        return view('register', compact('securityQuestions'));
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

    public function submitPassword(Request $request)
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
        return redirect('/login')->with('success', 'Password changed successful! Please log in.');
    }
    
}
