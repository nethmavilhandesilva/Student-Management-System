<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // ✅ Import Course model
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index():View
    {
        $courses = Course::all();
        return view('courses.index')->with('courses', $courses);
    }

    public function create():View
    {
        return view('courses.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Course::create($input); 
        return redirect('courses')->with('flash_message', 'Course Added!');
    }

    public function show(string $id)
    {
        $course = Course::findOrFail($id); // ✅ Correct variable name
        return view('courses.show', compact('course'));
    }

    public function edit(string $id)
    {
        $course = Course::find($id); 
        return view('courses.edit')->with('course', $course); // ✅ Correct variable name
    }
    

    public function update(Request $request, string $id): RedirectResponse
    {
        $course = Course::find($id);
        $input = $request->all();
        $course->update($input);
        return redirect('courses')->with('flash_message', 'Course Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Course::destroy($id);
        return redirect('courses')->with('flash_message', 'Course deleted!');
    }
}
