<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();  // Fixed case sensitivity issue
        return view('students.index')->with('students', $students);  // Fixed view naming
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Student::create($input);  // Ensure Student model allows mass assignment
        return redirect('students')->with('flash_message', 'Student Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $student = Student::find($id);  // Ensure you assign the variable correctly
    return view('students.show', compact('student'));  // Pass it to the view
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $student = Student::find($id);
        return view('students.edit')->with('students',$student);
    }

    /**
     * Update the specified resource in storage.
     */
   
        public function update(Request $request, string $id): RedirectResponse
        {
            $student = Student::find($id);
            $input = $request->all();
            $student->update($input);
            return redirect('students')->with('flash_message', 'student Updated!');  
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'Student deleted!'); 
    }
}
