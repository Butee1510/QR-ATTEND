<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturersController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:lecturers',
            'phone' => 'nullable|string|max:15',
            'user_id' => 'required|exists:users,id'
        ]);

        $lecturer = Lecturer::create($validated);

        return response()->json($lecturer, 201);
    }
    //
}
