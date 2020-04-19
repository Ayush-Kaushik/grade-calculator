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
            'worth_percent' => 'required|numeric',
            'mark_percent' => 'required|numeric'
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
        $finalExamStats = $this->getFinalExamStats($marksList);


        session()->put('current_mark', $currentMark);
        session()->put('final_exam_worth', $finalExamWorth);
        session()->put('final_exam_stats', $finalExamStats);
        return view('calculator');
    }

    /**
     * get current mark
     */
    public function getCurrentMark($marksList) {
        $currentMark = 0.0;
        $currentWorth = 0.0;
        foreach($marksList as $marks) {
            $currentMark = $currentMark + (($marks['worth_percent']/100) * $marks['mark_percent']);
            $currentWorth = $currentWorth + ($marks['worth_percent']/100);
        }

        if ($currentWorth == 0) {
            return $currentMark;
        }

        return $currentMark/ $currentWorth;
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
     * calculate the values for stats table
     */
    public function getFinalExamStats($marksList) {
        $currentMark = 0.0;
        $currentWorth = 0.0;
        $percentRemaining = 0.0;

        foreach($marksList as $marks) {
            $currentMark = $currentMark + (($marks['worth_percent']/100) * $marks['mark_percent']);
            $currentWorth = $currentWorth + ($marks['worth_percent']/100);
        }

        $currentPercentage = $currentMark/ $currentWorth;
        $percentRemaining = 1 - $currentWorth;

        $finalStats = [];
        for( $i = 50; $i <= 100; $i = $i + 10) {
            $finishWithScore = ($i - ($currentWorth * $currentPercentage)) / $percentRemaining;
            $finalStats[$i] = $finishWithScore;
        }

        return $finalStats;
    }


    /**
     * Remove a record from the table
     */
    public function destroy($id) {
        $marksList = session()->get('marks_list');
        unset($marksList[$id]);

        $currentMark = $this->getCurrentMark($marksList);
        $finalExamWorth = $this->getFinalExamPercent($marksList);

        session()->put('current_mark', $currentMark);
        session()->put('final_exam_worth', $finalExamWorth);
        session()->put('marks_list', $marksList);

        return redirect('/calculator');
    }
}
