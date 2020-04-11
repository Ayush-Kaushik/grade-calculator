@extends('layout.main')
@section('content')
    <h1>Grade Calculator</h1>
    <div class="container">
        <form action="" method="post" >
            <input type="text" name="course-item">
            <input type="text" name="worth-percent">
            <input type="text" name="mark-percent">
            <button type="submit" >Add entry</button>
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
    </div>
@endsection
