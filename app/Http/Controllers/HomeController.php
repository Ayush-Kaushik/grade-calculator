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
        session()->put('final_exam_stats', []);
        session()->put('final_exam_worth', 100);
        session()->put('current_mark', 0);
        session()->put('marks_list', []);
        return view('/calculator');
    }
}
