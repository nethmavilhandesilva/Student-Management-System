<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $payments = Payment::all();
        return view('payments.index')->with('payments', $payments);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $enrollments = Enrollment::pluck('enroll_no','id');
        return view('payments.create',compact('enrollments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $input = $request->all();
        Payment::create($input); 
        return redirect('payments')->with('flash_message', 'Payment Added!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::findOrFail($id); // ✅ Corrected variable name
        return view('payments.show', compact('payment')); // Pass $payment here
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id); 
        $enrollments = Enrollment::pluck('enroll_no', 'id'); // Assuming this is the correct data
        return view('payments.edit', compact('payment', 'enrollments')); // Pass both variables
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Find the payment by ID
        $payment = Payment::findOrFail($id);
        
        // Update the payment with the request data
        $payment->update($request->all());
        
        // Redirect to the payments index with a success message
        return redirect('payments')->with('flash_message', 'Payment Updated Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'payment deleted!');
    }
}
