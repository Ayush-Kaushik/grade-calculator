<?php

namespace App\Http\Controllers;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;

class CalculatorController extends BaseController
{

    public function index()
    {
        return view('calculator');
    }

    public function create(Request $request)
    {
        print_r($request->course_item);
        print_r($request->worth_percent);
        print_r($request->mark_percent);
    }

    public function new(Request $request) {
        $course_title = $request->course_name;
        return view('calculator', compact('course_title'));
    }
}
