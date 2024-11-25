@extends('layouts.dashboard')

@section('title', 'Edit Course')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Edit Course</h1>

    <div class="max-w-4xl p-6 bg-white rounded-md shadow-md ">
        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menandakan bahwa ini adalah request PUT -->

            <!-- Course Code -->
            <div class="mb-4">
                <label for="code" class="text-gray-700 ">Course Code</label>
                <input type="text" name="code" id="code" value="{{ old('code', $course->code) }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                @error('code')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Course Name -->
            <div class="mb-4">
                <label for="name" class="text-gray-700 ">Course Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $course->name) }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Course Description -->
            <div class="mb-4">
                <label for="description" class="text-gray-700 ">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">{{ old('description', $course->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Update</button>
            </div>
        </form>
    </div>
@endsection
