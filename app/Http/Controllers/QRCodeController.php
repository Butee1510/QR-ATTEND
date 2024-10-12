<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Http\Request;
use App\Models\Course;

class QRCodeController extends Controller
{
    /**
     * Generate a QR code for a given course.
     *
     * @param  int  $course
     * @return \Illuminate\Http\Response
     */
    public function generateQRCode($course)
    {

        // Fetch the course from the database
        $course = Course::findOrFail($course);

        // Generate the QR code with the course information (or course URL)
        $qrCode = QrCode::size(200)->generate(url("/course-attendance/{$course->id}"));

        // Return the QR code as an image response
        return response($qrCode, 200)->header('Content-Type', 'image/svg+xml');
    }
}
