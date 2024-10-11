<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'lecturer_id' => 'required|exists:lecturers,id',
            'date' => 'required|date',
            'status' => 'required|boolean'
        ]);

        $attendance = Attendance::create($validated);

        return response()->json($attendance, 201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
    public function generateCourseQrCode($courseId)
    {
    $course = Course::findOrFail($courseId);

    // Generate the QR code data for the course
    $qrCodeData = route('attendance.scan', ['course_id' => $course->id]);

    // Generate QR code image
    $qrCode = QrCode::size(300)->generate($qrCodeData);

    return view('lecturers.dashboard', compact('course', 'qrCode'));
    }
    public function logAttendance(Request $request)
    {
    $studentid = auth()->user()->id; // Assuming the user is authenticated as a student
    $courseid = $request->course_id;

    Attendance::create([
        'student_id' => $studentId,
        'course_id' => $courseId,
        'scan_time' => Carbon::now(),
    ]);

    return redirect()->route('student.dashboard')->with('success', 'Attendance logged successfully');
    }
    public function manageAttendance($courseId)
    {
    $attendances = Attendance::where('course_id', $courseId)->get();
    $totalStudents = $attendances->count();

    return view('lecturers.manage_attendance', compact('attendances', 'totalStudents'));
    }


}
