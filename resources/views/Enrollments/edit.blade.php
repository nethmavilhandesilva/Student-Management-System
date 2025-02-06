@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('enrollments/' .$enrollment->id) }}" method="post">  <!-- ✅ Fix here -->
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="enroll_no" id="enroll_no" value="{{$enrollment->enroll_no}}" id="enroll-no" />
        <label>Batch_ID</label></br>
        <input type="int" name="batch_id" id="batch_id" value="{{$enrolment->batch_id}}" class="form-control"></br> <!-- ✅ Fix here -->
        <label>Student_ID</label></br>
        <input type="int" name="student_id" id="student_id" value="{{$entollment->student_id}}" class="form-control"></br> <!-- ✅ Fix here -->
        <label>Join_Date</label></br>
        <input type="int" name="joint_date" id="joint_date" value="{{$enrollment->joint_date}}" class="form-control"></br> <!-- ✅ Fix here -->
        <label>Fee</label></br>
        <input type="int" name="fee" id="fee" value="{{$enrollment->fee}}" class="form-control"></br> <!-- ✅ Fix here -->
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
