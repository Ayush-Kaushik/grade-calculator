@extends('layout.main')
@section('content')
    <div class="flex-center">
        <form action="{{ action('HomeController@create') }}" method="post" class="form-group">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" name="course_name">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    <div>
@endsection