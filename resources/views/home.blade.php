@extends('layout.main')
@section('content')
    <h1>Welcome to Grade Calculator!</h1>
    <h2>Enter your code name or code</h2>
    <div class="container">
        <form action="{{ action('CalculatorController@new') }}" method="post" class="form-group">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" name="course_name">
            </div>
            <button type="submit" class="btn btn-submit">Add</button>
            <button class="btn btn-warning">Clear</button>
        </form>
    </div>
@endsection