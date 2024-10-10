<?php

namespace App\Http\Controllers;

use App\Models\CourseRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseRegistrationController extends Controller
{
    public function store(Request $request){




    // Create a new course registration
    $registration = CourseRegistration::create([
        'course_id' => $request->course_id,
        'student_id' => Auth::id(), // Assuming the student is the authenticated user
    ]);

    // Return a response
    return response()->json(['message' => 'Course registered successfully!', 'registration' => $registration], 201);
    }


}
