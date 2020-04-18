@extends('layout.main')
@section('content')
    <div class="bg-gradient-primary">
        <div class="container">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Grade Calculator</h1>
            </div>
            <form action="{{ action('HomeController@create') }}" method="post" class="user">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="course_name" placeholder="Enter course code ...">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Add</button>
            </form>
        </div>
    <div>
@endsection