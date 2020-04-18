<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'course_item' => 'required|numeric|between:0,100.00',
            'worth_percent' => 'required|numeric|between:0,100.00',
            'mark_percent' => 'required|numeric|between:0,100.00'
        ]);

        $item = array(
            "course_item" => $request->course_item,
            "worth_percent" => $request->worth_percent,
            "mark_percent" => $request->mark_percent
        );

        print_r($item);

        $marksList = session()->get('marks_list');
        print_r($marksList);

        if ($marksList == NULL or $marksList->empty()) {
            array_push($marksList, $item);
            session()->put('marks_list', []);
        } else {
            array_push($marksList, $item);
            session()->put('marks_list', $marksList);
        }

        print_r(session()->get('marks_list'));

        // return view('calculator');
    }
}
