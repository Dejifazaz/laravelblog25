@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="bg-gray-900 text-white text-center py-20">
        <h1 class="text-5xl font-bold">About Me</h1>
        <p class="mt-4 text-lg w-3/5 mx-auto">A passionate developer dedicated to building innovative solutions.</p>
    </div>

    <!-- Three Column Layout -->
    <div class="grid md:grid-cols-3 gap-10 w-4/5 mx-auto py-16">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-700">Web Development</h2>
            <p class="text-gray-500 mt-4">Building modern and responsive web applications with the latest technologies.</p>
        </div>
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-700">UI/UX Design</h2>
            <p class="text-gray-500 mt-4">Creating seamless and user-friendly experiences through design.</p>
        </div>
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-700">Backend Development</h2>
            <p class="text-gray-500 mt-4">Developing robust and scalable backend systems using Laravel and PHP.</p>
        </div>
    </div>

    <!-- Two Column Layout with Images -->
    <div class="grid md:grid-cols-2 gap-10 w-4/5 mx-auto pb-16">
        <div class="text-center">
            <img src="https://via.placeholder.com/300" alt="Placeholder Image" class="mx-auto rounded-lg shadow-md">
            <p class="text-gray-500 mt-4">Passionate about coding and problem-solving.</p>
        </div>
        <div class="text-center">
            <img src="https://via.placeholder.com/300" alt="Placeholder Image" class="mx-auto rounded-lg shadow-md">
            <p class="text-gray-500 mt-4">Lifelong learner and technology enthusiast.</p>
        </div>
    </div>
@endsection
