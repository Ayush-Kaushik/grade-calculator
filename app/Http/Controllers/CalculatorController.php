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
            'course_item' => 'required',
            'worth_percent' => 'required|numeric|between:0,100.00',
            'mark_percent' => 'required|numeric|between:0,100.00'
        ]);

        $item = array(
            "course_item" => $request->course_item,
            "worth_percent" => $request->worth_percent,
            "mark_percent" => $request->mark_percent
        );

        $marksList = session()->get('marks_list');

        if ($marksList == NULL or count($marksList) == 0) {
            $marksList = [];
        }

        array_push($marksList, $item);
        session()->put('marks_list', $marksList);

        $currentMark = $this->getCurrentMark($marksList);
        $finalExamWorth = $this->getFinalExamPercent($marksList);
        session()->put('current_mark', $currentMark);
        session()->put('final_exam_worth', $finalExamWorth);
        return view('calculator');
    }

    /**
     * get current mark
     */
    public function getCurrentMark($marksList) {
        $currentMark = 0.0;
        foreach($marksList as $marks) {
            $currentMark = $currentMark + (($marks['worth_percent']/100) * $marks['mark_percent']);
        }

        return $currentMark;
    }

    /**
     * calculate final mark
     */
    public function getFinalExamPercent($marksList) {
        $currentMark = 0.0;
        foreach($marksList as $marks) {
            $currentMark = $currentMark + $marks['worth_percent'];
        }

        return (100.0 - $currentMark);
    }

    /**
     * Remove a record from the table
     */
    public function destroy($id) {
        $marksList = session()->get('marks_list');
        unset($marksList[$id]);

        $currentMark = $this->getCurrentMark($marksList);
        session()->put('current_mark', $currentMark);
        session()->put('marks_list', $marksList);
        return view('calculator');
    }
}
