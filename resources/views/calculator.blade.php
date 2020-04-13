@extends('layout.main')
@section('content')
    <h1>Course title: {course-title}</h1>
    <div class="container">
        <form action="{{ action('CalculatorController@addEntry') }}" method="post" class="form-group">
            <div class="form-group">
                <div class="form-label"><label for="course_item">Course Item</label></div>
                <div class="form-input"><input type="text" name="course_item"></div>
            </div>
            <div class="form-group">
                <div class="form-label"><label for="worth_percent">Worth (in %)</label></div>
                <div class="form-input"><input type="text" name="worth_percent"></div>
            </div>
            <div class="form-group">
                <div class="form-label"><label for="mark_percent">Your Mark (in %)</label></div>
                <div class="form-input"><input type="text" name="mark_percent"></div>
            </div>
            <button type="submit" class="btn btn-primary">Add Entry</button>
            <button class="btn btn-warning">Clear Entry</button>
        </form>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Item</th>
                <th scope="col">Worth (in %)</th>
                <th scope="col">Your Mark (in %)</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        <div>
        </div>
    </div>
@endsection
