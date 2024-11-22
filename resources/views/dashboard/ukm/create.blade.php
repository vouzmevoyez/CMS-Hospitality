@extends('layouts.dashboard')

@section('title', 'Create UKM')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Create UKM</h1>

    <div class="max-w-4xl p-6 bg-white rounded-md shadow-md dark:bg-gray-800">
        <form action="{{ route('ukms.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="text-gray-700 dark:text-gray-200">UKM Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="url" class="text-gray-700 dark:text-gray-200">URL</label>
                <input type="url" name="url" id="url" value="{{ old('url') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                @error('url')
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
