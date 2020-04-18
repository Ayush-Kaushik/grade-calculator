@extends('layout.main')
@section('content')
    <h1>Course title: {{Session::get('course_title')}}</h1>
    <div class="container">
        <form action="{{ action('CalculatorController@create') }}" method="post" class="form-group">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-label"><label for="course_item">Course Item</label></div>
                <div class="form-input"><input type="text" name="course_item" id="course_item"></div>
            </div>
            <div class="form-group">
                <div class="form-label"><label for="worth_percent">Worth (in %)</label></div>
                <div class="form-input"><input type="text" name="worth_percent" if="worth_percent"></div>
            </div>
            <div class="form-group">
                <div class="form-label"><label for="mark_percent">Your Mark (in %)</label></div>
                <div class="form-input"><input type="text" name="mark_percent" id="mark_percent"></div>
            </div>
            <button type="submit" class="btn btn-primary">Add Entry</button>
            <button class="btn btn-warning">Clear Entry</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Item</th>
                <th scope="col">Worth (in %)</th>
                <th scope="col">Your Mark (in %)</th>
              </tr>
            </thead>
            <tbody>
                @if(Session::has('marks_list'))
                    @foreach (Session::get('marks_list') as $item)
                    <tr>
                        <td>{{$item['course_item']}}</td>
                        <td>{{$item['worth_percent']}}</td>
                        <td>{{$item['mark_percent']}}</td>        
                    </tr>
                    @endforeach
                @endif
            </tbody>
          </table>

          @if(Session::has('current_mark'))
            <p>Your current Mark is {{Session::get('current_mark')}}%</p>
          @endif
        <div>
        </div>
    </div>
@endsection
