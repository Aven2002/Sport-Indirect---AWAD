<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requets;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::all();
        return response()->json($profile);
    }
}
