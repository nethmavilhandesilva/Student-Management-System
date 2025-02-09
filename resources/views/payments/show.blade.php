@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Batches Page</div>
  <div class="card-body">
    <div class="card-body">
      <h5 class="card-title">Enrollment_No: {{ $payment->enroll_no }}</h5> <!-- Fixed to $batch -->
      <p class="card-text">Paid_Date: {{ $payment->paid_date }}</p> <!-- Fixed to $batch -->
      <p class="card-text">Amount: {{ $payment->amount }}</p> <!-- Fixed to $batch -->
    </div>
  </div>
</div>

@endsection
