<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

        </h2>



        @if (Auth::user()->user_type === 'student')
            <p>Welcome, student</p>
        @elseif (Auth::user()->user_type === 'lecturer')
            <p>Welcome, lecturer</p>
        @endif


    </x-slot>




    @if (Auth::user()->user_type === 'student')
        <div class=" flex items-center justify-center">
            <div class="w-full max-w-4xl p-5">
                <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Student Dashboard</h1>
         @elseif (Auth::user()->user_type === 'lecturer')
                <div class=" flex items-center justify-center">
                    <div class="w-full max-w-4xl p-5">
                        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Lecturers Dashboard </h1>
    @endif




    <!-- Card: Scan Attendance -->
    <!-- Card Container -->



         <div class="flex flex-col justify-end mt-1 grid grid-cols-1 md:grid-cols-3 gap-6">


        @if (Auth::user()->user_type === 'student')
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="p-6 text-center">
                    <div class="mb-4">
                        <svg class="w-12 h-12 mx-auto text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11c1.657 0 3-.895 3-2s-1.343-2-3-2-3 .895-3 2 .895 2 3 2zm0 4c-1.657 0-3 .895-3 2v3h6v-3c0-1.105-1.343-2-3-2z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Scan Attendance</h2>
                    <p class="text-gray-600 mt-2"> </p>
                    <a href="/scan-attendance"
                        class="mt-4 inline-block bg-indigo-500 text-white px-6 py-2 rounded-full hover:bg-indigo-600">Go</a>

                </div>
                @elseif (Auth::user()->user_type === 'lecturer')
                <!-- Generate QR Code Card -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex justify-center mb-4">
                        <img src="https://via.placeholder.com/100" alt="QR Code" class="h-16 w-16">
                    </div>
                    <h2 class="text-xl font-bold text-center mb-2">Generate QR Code</h2>
                    <p class="text-gray-600 text-center mb-4">Generate QR codes for student attendance.</p>
                    <!-- Registration Form -->

                    <form action="{{ route('course.registration.store') }}" method="POST" id="course-registration-form">
                        @csrf
                        <!-- Your form fields go here -->



                        <!-- Course Dropdown -->
                        <div class="mb-4">

                            <select id="course_id" name="course_id"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">-- Select a Course --</option>
                                <option value="1">COSC 101</option>
                                <option value="2">COSC 201</option>
                                <option value="3">COSC 301</option>
                                <option value="4">COSC 401</option>
                    <div class="text-center">
                        <a href="#"
                            class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Generate</a>
                    </div>
        @endif
    </div>


    <!-- card 2: Register Course -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-center mb-4">
            <img src="https://via.placeholder.com/100" alt="Register for Course" class="h-16 w-16">
        </div>
        <h2 class="text-xl font-bold text-center mb-2"></h2>
        <p class="text-gray-600 text-center mb-4">Select and register for an available course.</p>
        <!-- Registration Form -->

        <form action="{{ route('course.registration.store') }}" method="POST" id="course-registration-form">
            @csrf
            <!-- Your form fields go here -->



            <!-- Course Dropdown -->
            <div class="mb-4">

                <select id="course_id" name="course_id"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">-- Select a Course --</option>
                    <option value="1">COSC 101</option>
                    <option value="2">COSC 201</option>
                    <option value="3">COSC 301</option>
                    <option value="4">COSC 401</option>
        <div class="text-center">




                    <!-- Loop through courses in your database -->

                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit"
                    class="mt-4 inline-block bg-green-500 justify-center text-white px-6 py-2 rounded-full hover:bg-green-600">
                    Register


                </button>
            </div>
        </form>

        </form>
    </div>
    <!-- Card 3: Feedback -->

    @if (Auth::user()->user_type === 'student')
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 h-50">
            <div class="p-4 text-center">
                <div class="mb-4">
                    <svg class="w-12 h-12 mx-auto text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h8m-4 8H5V5a2 2 0 012-2h10a2 2 0 012 2v11a2 2 0 01-2 2h-5l-3 3v-3z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Feedback</h2>
                <p class="text-gray-600 mt-2">Submit feedback to improve your experience.</p>
                <textarea id="feedbackText" rows="3" class="w-full border border-gray-300 rounded-md p-2" placeholder="Enter your feedback..."></textarea>

                <a href="#" id="emailLink" class="mt-4 bg-indigo-500 text-white px-4 py-2 rounded-md inline-block text-center">Send Feedback</a>
            </div>
        </div>
            </div>
        </div>
    @elseif (Auth::user()->user_type === 'lecturer')
        <!-- Manage Attendance Card -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-center mb-4">
                <img src="https://via.placeholder.com/100" alt="Manage Attendance" class="h-16 w-16">
            </div>
            <h2 class="text-xl font-bold text-center mb-2">Manage Attendance</h2>
            <p class="text-gray-600 text-center mb-4">Manage and track student attendance records.</p>
            <div class="text-center">
                <a href="#" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Manage</a>
            </div>
        </div>
    @endif


    <!-- Report Card -->
    @if (Auth::user()->user_type === 'lecturer')
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-center mb-4">
                <img src="https://via.placeholder.com/100" alt="Report" class="h-16 w-16">
            </div>
            <h2 class="text-xl font-bold text-center mb-2">Report</h2>
            <p class="text-gray-600 text-center mb-4">View reports on attendance data.</p>
            <div class="text-center">
                <a href="#" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600">View
                    Report</a>
            </div>
        </div>
    @endif
    <!-- feedback -->
    @if (Auth::user()->user_type === 'lecturer')
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-6 text-center">
                <div class="mb-4">
                    <svg class="w-12 h-12 mx-auto text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h8m-4 8H5V5a2 2 0 012-2h10a2 2 0 012 2v11a2 2 0 01-2 2h-5l-3 3v-3z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Feedback</h2>
                <p class="text-gray-600 mt-2">Submit feedback to improve your experience.</p>
                <textarea id="feedbackText" rows="3" class="w-full border border-gray-300 rounded-md p-2" placeholder="Enter your feedback..."></textarea>

                <a href="#" id="emailLink" class="mt-4 bg-indigo-500 text-white px-4 py-2 rounded-md inline-block text-center">Send Feedback</a>
            </div>
        </div>

        <script>
            document.getElementById("emailLink").onclick = function () {
                // Get the feedback from the textarea
                var feedback = document.getElementById("feedbackText").value;

                // Prepare the email content using 'mailto:'
                var subject = "User Feedback";
                var body = encodeURIComponent(feedback); // Encode the feedback for URL
                var email = "khaleefasadeeq06@gmail.com"; // Replace with your email address

                // Set the mailto link dynamically
                this.href = `mailto:${email}?subject=${subject}&body=${body}`;
            };
        </script>



            </div>


    @endif




        </div>



    </div>
    </div>
    </div>
    </div>
</x-app-layout>
