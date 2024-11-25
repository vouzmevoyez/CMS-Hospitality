@extends('layouts.dashboard')

@section('title', 'Create Lecturer')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Create Lecturer</h1>

    <div class="max-w-4xl p-6 bg-white rounded-md shadow-md ">
        <form action="{{ route('lecturers.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="text-gray-700 ">Lecturer Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="text-gray-700 ">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="text-gray-700 ">Phone Number</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="department" class="text-gray-700 ">Department</label>
                <input type="text" name="department" id="department" value="{{ old('department') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                @error('department')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Create</button>
            </div>
        </form>
    </div>
@endsection
