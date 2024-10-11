<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseRegistrationController;

use Illuminate\Support\Facades\Route;


// Route for creating a Lecturer
Route::post('/lecturers', [LecturerController::class, 'store']);

// Route for creating a Student
Route::post('/students', [StudentController::class, 'store']);

// Route for creating Attendance
Route::post('/attendances', [AttendanceController::class, 'store']);

// Route for creating a Course
Route::post('/courses', [CourseController::class, 'store']);

// Route for creating a CourseRegistration
Route::get('/course-registrations', [CourseRegistrationController::class, 'create'])->name('course.registration.form');
Route::post('/course-registrations', [CourseRegistrationController::class, 'store'])->name('course.registration.store');

// Generate QR Code for course
Route::get('/lecturer/course/{courseId}/qrcode', [AttendanceController::class, 'generateCourseQrCode'])->name('generate.qrcode');

// Log attendance when QR code is scanned
Route::get('/attendance/scan', [AttendanceController::class, 'logAttendance'])->name('attendance.scan');

// Manage attendance for a course
Route::get('/lecturer/course/{courseId}/manage-attendance', [AttendanceController::class, 'manageAttendance'])->name('manage.attendance');



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
