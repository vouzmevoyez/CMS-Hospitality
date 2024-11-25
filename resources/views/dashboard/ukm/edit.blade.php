@extends('layouts.dashboard')

@section('title', 'Edit UKM')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Edit UKM</h1>

    <div class="max-w-4xl p-6 bg-white rounded-md shadow-md ">
        <form action="{{ route('ukms.update', $ukm->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menandakan bahwa ini adalah request PUT -->

            <div class="mb-4">
                <label for="name" class="text-gray-700 ">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $ukm->name) }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="url" class="text-gray-700 ">URL</label>
                <input type="url" name="url" id="url" value="{{ old('url', $ukm->url) }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                @error('url')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Update</button>
            </div>
        </form>
    </div>
@endsection
