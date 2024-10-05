<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'reg_number' => 'required|string|max:9|unique:students',
            'user_id' => 'required|exists:users,id'
        ]);

        $student = Student::create($validated);

        return response()->json($student, 201);
    }
    //
}
