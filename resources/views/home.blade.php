@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <h1 class="text-xl sm:text-2xl">Dashboard</h1>
                </header>

                <div class="w-full p-6">
                    <p class="text-gray-700 text-lg">
                        You are successfully logged in! Welcome to your dashboard.
                    </p>

                    <div class="mt-6 text-center">
                        <a href="/blog" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                            Go to Blog
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
