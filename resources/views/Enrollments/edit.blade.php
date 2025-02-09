@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Edit Page</div>
    <div class="card-body">
        <form action="{{ url('enrollments/' . $enrollment->id) }}" method="post">  <!-- Correct URL for patch -->
            {!! csrf_field() !!}
            @method("PATCH")
            <label>Enroll_No</label></br>
            <input type="text" name="enroll_no" id="enroll_no" value="{{ $enrollment->enroll_no }}" class="form-control"></br>
            
            <label>Batch_ID</label></br>
            <input type="number" name="batch_id" id="batch_id" value="{{ $enrollment->batch_id }}" class="form-control"></br> <!-- Corrected variable name -->

            <label>Student_ID</label></br>
            <input type="number" name="student_id" id="student_id" value="{{ $enrollment->student_id }}" class="form-control"></br> <!-- Corrected variable name -->

            <label>Join_Date</label></br>
            <input type="date" name="join_date" id="join_date" value="{{ $enrollment->join_date }}" class="form-control"></br> <!-- Corrected input type and variable name -->

            <label>Fee</label></br>
            <input type="number" name="fee" id="fee" value="{{ $enrollment->fee }}" class="form-control"></br> <!-- Corrected variable name -->

            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
    </div>
</div>

@stop
