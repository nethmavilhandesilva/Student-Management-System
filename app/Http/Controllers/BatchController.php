<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch; // ✅ Import Course model
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $batches = Batch::all();
        return view('batches.index')->with('batches', $batches);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $courses = Course::pluck('name','id');
        return view('batches.create',compact('courses'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $input = $request->all();
        Batch::create($input); 
        return redirect('batches')->with('flash_message', 'Batch Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $batch = Batch::findOrFail($id); // ✅ Correct variable name
        return view('batches.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batch = Batch::find($id); 
        return view('batches.edit')->with('batch', $batch); // ✅ Correct variable name
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $batch = Batch::find($id);
        $input = $request->all();
        $batch->update($input);
        return redirect('batches')->with('flash_message', 'Batch Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Batch::destroy($id);
        return redirect('batches')->with('flash_message', 'Batch deleted!');
    }
}
