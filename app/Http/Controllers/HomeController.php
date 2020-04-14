<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{

    public function index()
    {
        return view('home');
    }

    public function create()
    {
        // print_r($request->course_name);
        return redirect('/calculator');
    }
}
