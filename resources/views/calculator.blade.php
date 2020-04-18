@extends('layout.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary">{{Session::get('course_title')}}</h1>
        </div>

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
        
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Worth (in %)</th>
                    <th scope="col">Your Mark (in %)</th>
                </tr>
                </thead>
                <tbody>
                    @if(Session::has('marks_list'))
                        @foreach (Session::get('marks_list') as $itemKey => $itemValue)
                        <tr>
                            <td>{{$itemValue['course_item']}}</td>
                            <td>{{$itemValue['worth_percent']}}</td>
                            <td>{{$itemValue['mark_percent']}}</td>  
                            <td>
                                <form action="{{ action('CalculatorController@destroy', $itemKey) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>      
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            @if(Session::has('current_mark'))
                <p>Your current Mark is {{Session::get('current_mark')}}%</p>
            @endif

            @if(Session::has('final_exam_worth'))
                <p>Final exam worth {{Session::get('final_exam_worth')}}%</p>
            @endif

            @if(Session::has('final_exam_stats'))
                @foreach (Session::get('final_exam_stats') as $itemKey => $itemValue)
                    <p>To finish with {{$itemKey}} required on final: {{$itemValue}}%</p>
                @endforeach
            @endif
            <div>
            </div>
        </div>
        </div>
    </div>
@endsection
