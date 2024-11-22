@extends('layouts.dashboard')

@section('title', 'Edit Lecturer')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Edit Lecturer</h1>

    <div class="max-w-4xl p-6 bg-white rounded-md shadow-md dark:bg-gray-800">
        <form action="{{ route('lecturers.update', $lecturer->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menandakan bahwa ini adalah request PUT -->

            <!-- Lecturer Name -->
            <div class="mb-4">
                <label for="name" class="text-gray-700 dark:text-gray-200">Lecturer Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $lecturer->name) }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Lecturer Email -->
            <div class="mb-4">
                <label for="email" class="text-gray-700 dark:text-gray-200">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $lecturer->email) }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Lecturer Phone -->
            <div class="mb-4">
                <label for="phone" class="text-gray-700 dark:text-gray-200">Phone Number</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $lecturer->phone) }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Lecturer Department -->
            <div class="mb-4">
                <label for="department" class="text-gray-700 dark:text-gray-200">Department</label>
                <input type="text" name="department" id="department"
                    value="{{ old('department', $lecturer->department) }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                @error('department')
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
