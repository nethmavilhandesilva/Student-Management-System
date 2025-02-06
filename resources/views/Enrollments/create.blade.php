@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Enrollment Page</div>
  <div class="card-body">
      
      <form action="{{ url('enrollments') }}" method="post">
        {!! csrf_field() !!}
        <label>Enroll_No</label></br>
        <input type="int" name="enroll_no" id="enroll_no" class="form-control"></br>
        <label>Batch_ID</label></br>
        <input type="int" name="batch_id" id="batch_id" class="form-control"></br>
        <label>Student_ID</label></br>
        <input type="int" name="student_id" id="student_id" class="form-control"></br>
        <label>Join_Date</label></br>
        <input type="int" name="join_date" id="join_date" class="form-control"></br>
        <label>Fee</label></br>
        <input type="int" name="fee" id="fee" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop