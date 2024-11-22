@extends('layouts.dashboard')

@section('title', 'Courses')

@section('content')
    <div class="mb-3">
        <a href="{{ route('courses.create') }}">
            <button
                class="items-center px-6 py-4 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-red-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                <i class="fa-solid fa-folder-plus mx-1"></i>
                <span class="mx-1">Add Courses</span>
            </button>
        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $course->code }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $course->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $course->description }}
                        </td>
                        <td class="px-6 py-4">
                            <!-- Edit Button with Icon -->
                            <a href="{{ route('courses.edit', $course->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>

                            <!-- Delete Button with Icon -->
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ml-4">
                                    <i class="fas fa-trash-alt mr-1"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
