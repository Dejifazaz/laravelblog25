@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl font-semibold text-gray-800">
                Create Post
            </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="w-4/5 m-auto mt-6">
            <ul class="bg-red-100 text-red-800 p-4 rounded-lg shadow-md">
                @foreach ($errors->all() as $error)
                    <li class="mb-3">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-4/5 m-auto pt-20">
        <form
            action="/blog"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <input
                    type="text"
                    name="title"
                    placeholder="Title..."
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none focus:ring-2 focus:ring-blue-500 p-2">
            </div>

            <div class="mb-6">
            <textarea
                name="description"
                placeholder="Description..."
                class="py-4 bg-transparent block border-b-2 w-full h-60 text-lg outline-none focus:ring-2 focus:ring-blue-500 p-2"></textarea>
            </div>

            <div class="bg-grey-lighter pt-15 mb-6">
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Select a file
                </span>
                    <input
                        type="file"
                        name="image"
                        class="hidden">
                </label>
            </div>

            <button
                type="submit"
                class="uppercase mt-6 bg-blue-600 hover:bg-blue-700 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
                Submit Post
            </button>
        </form>
    </div>

@endsection
