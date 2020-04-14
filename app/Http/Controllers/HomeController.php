<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function create(Request $request)
    {
        $course_title = $request->course_name;
        return redirect('/calculator', compact('course_title'));
    }
}
