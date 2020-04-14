<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CalculatorController extends Controller
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
}
