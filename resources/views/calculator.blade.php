@extends('layout.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Enter Grades</h6>
            </div>
            <div class="card shadow mb-4">
                <form action="{{ action('CalculatorController@create') }}" method="post" class="user">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input placeholder="Course Item ..." type="text" class="form-control form-control-user" name="course_item" id="course_item">
                    </div>
        
                    <div class="form-group">
                        <input placeholder="Worth (in %)" class="form-control form-control-user" type="text" name="worth_percent" if="worth_percent">
                    </div>
        
                    <div class="form-group">
                        <input placeholder="Your Mark (in %)" class="form-control form-control-user" type="text" name="mark_percent" id="mark_percent">
                    </div>
        
                    <button type="submit" class="btn btn-success btn-user btn-block">Add Entry</button>
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
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Grades Stats</h6>
                  </div>
                <p>Your current Mark is {{Session::get('current_mark')}}%</p>
                <p>Final exam worth {{Session::get('final_exam_worth')}}%</p>
    
                @if(Session::has('final_exam_stats'))
                    @foreach (Session::get('final_exam_stats') as $itemKey => $itemValue)
                        <p>To finish with <b>{{$itemKey}}%</b> required on final: {{$itemValue}}%</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{Session::get('course_title')}}</h6>
        </div>

        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Worth (in %)</th>
                    <th scope="col">Your Mark (in %)</th>
                    <th scope="col">Actions</th>
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

            
            <div>
            </div>
        </div>
        </div>
    </div>
<div>
@endsection
