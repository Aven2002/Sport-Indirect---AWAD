<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewController extends Controller
{
    public function show($view)
    {
        if(view()->exists($view))
        {
            return view($view);
        }
        abort(404); //Show 404 view if the view tht trying to access not exist
    }
}
