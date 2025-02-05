@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Batches Page</div>
  <div class="card-body">
    <div class="card-body">
      <h5 class="card-title">Name: {{ $batch->name }}</h5> <!-- Fixed to $batch -->
      <p class="card-text">Course_ID: {{ $batch->course_id }}</p> <!-- Fixed to $batch -->
      <p class="card-text">Start_Date: {{ $batch->start_date }}</p> <!-- Fixed to $batch -->
    </div>
  </div>
</div>

@endsection
