<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;

class CalculatorControler extends BaseController
{

    public function index()
    {
        return view('calculator');
    }

    public function addEntry(Request $request)
    {
        print_r($request->course_item);
        print_r($request->worth_percent);
        print_r($request->mark_percent);
    }
}
