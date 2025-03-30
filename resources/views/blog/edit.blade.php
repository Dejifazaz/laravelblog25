@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl font-semibold text-gray-800">
                Update Post
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
            action="/blog/{{ $post->slug }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $post->title) }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none focus:ring-2 focus:ring-blue-500 p-2">
            </div>

            <div class="mb-6">
            <textarea
                name="description"
                placeholder="Description..."
                class="py-4 bg-transparent block border-b-2 w-full h-60 text-lg outline-none focus:ring-2 focus:ring-blue-500 p-2">{{ old('description', $post->description) }}</textarea>
            </div>

            <button
                type="submit"
                class="uppercase mt-6 bg-blue-600 hover:bg-blue-700 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
                Update Post
            </button>
        </form>
    </div>

@endsection
