<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment; // ✅ Import Course model
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;


class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $enrollments = Enrollment::all();
        return view('enrollments.index')->with('enrollments', $enrollments); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('enrollments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $input = $request->all();
        Enrollment::create($input); 
        
        return redirect('enrollments')->with('flash_message', 'Enrollment Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollment = Enrollment::findOrFail($id); // ✅ Correct variable name
        return view('enrollments.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enrollment = Enrollment::find($id); 
        return view('enrollments.edit')->with('enrollment', $enrollment); // ✅ Correct variable name
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $enrollment = Enrollment::find($id); 
        return view('enrollments.edit')->with('enrollment', $enrollment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'Enrollment deleted!');
    }
}
