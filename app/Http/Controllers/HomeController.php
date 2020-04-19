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
        $request->session()->put('course_title', $request->course_name);
        $request->session()->put('final_exam_stats', []);
        session()->put('final_exam_worth', 0);
        return view('/calculator');
    }
}
