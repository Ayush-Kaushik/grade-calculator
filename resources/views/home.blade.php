@extends('layout.main')
@section('content')
    <h1>Grade Calculator</h1>
    <div class="container">
        <form action="" method="post" class="form-group">
            <div class="form-group">
                <label for="course-item">Course Item</label>
                <input type="text" name="course-item">
            </div>
            <div class="form-group">
                <label for="worth-percent">Worth (in %)</label>
                <input type="text" name="worth-percent">
            </div>
            <div class="form-group">
                <label for="worth-percent">Your Mark (in %)</label>
                <input type="text" name="mark-percent">
            </div>
            <button type="submit" class="btn btn-primary">Add Entry</button>
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
