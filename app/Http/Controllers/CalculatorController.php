<?php

namespace App\Http\Controllers\Controller;
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
        $this->validate($request, [
            'course_item' => 'required',
            'worth_percent' => 'required',
            'mark_percent' => 'required'
        ]);

        print_r($request->course_item);
        print_r($request->worth_percent);
        print_r($request->mark_percent);
    }
}
