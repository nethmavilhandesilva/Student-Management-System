@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('payments/' .$payment->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$payment->id}}" /> <!-- Corrected $payment -->

        <!-- Enrollment Select -->
        <label>Enrollment_No</label></br>
        <select name="enrollment_no" id="enrollment_no" class="form-control">
          @foreach($enrollments as $id => $enroll_no) <!-- Corrected: use $enrollments -->
            <option value="{{ $id }}" @if($payment->enrollment_id == $id) selected @endif>{{ $enroll_no }}</option> <!-- Pre-select current enrollment -->
          @endforeach
        </select></br>

        <!-- Paid Date -->
        <label>Paid_Date</label></br>
        <input type="date" name="paid_date" id="paid_date" value="{{ $payment->paid_date }}" class="form-control"></br> <!-- Corrected -->

        <!-- Amount -->
        <label>Amount</label></br>
        <input type="number" name="amount" id="amount" value="{{ $payment->amount }}" class="form-control"></br> <!-- Corrected -->

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>

@stop
