@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Enrollment Page</div>
  <div class="card-body">
    <div class="card-body">
      <h5 class="card-title">Enroll_No: {{ $enrollment->enroll_no }}</h5>
      <p class="card-text">Batch_ID: {{ $enrollment->batch_id }}</p>
      <p class="card-text">Student_ID: {{ $enrollment->student_id }}</p>
      <p class="card-text">Join_Date: {{ $enrollment->joint_date }}</p>
      <p class="card-text">Fee: {{ $enrollment->fee }}</p>
    </div>
  </div>
</div>

@endsection
