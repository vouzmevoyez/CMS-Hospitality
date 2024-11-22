@extends('layouts.dashboard')

@section('title', 'Lecturers')

@section('content')
    <div class="mb-6 mt-3">
        <a href="{{ route('lecturers.create') }}"
            class="items-center px-6 py-4 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-red-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            <i class="fa-solid fa-user-plus mx-1"></i>
            <span class="mx-1">Add Lecturers</span>
        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Department
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lecturers as $lecturer)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $lecturer->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $lecturer->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $lecturer->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $lecturer->department }}
                        </td>
                        <td class="px-6 py-4 flex items-center space-x-4">
                            <!-- Edit Button -->
                            <a href="{{ route('lecturers.edit', $lecturer->id) }}"
                                class="text-blue-600 dark:text-blue-500 hover:underline flex items-center">
                                <i class="fa-solid fa-pencil-alt mr-2"></i> <!-- Icon Edit -->
                                <span>Edit</span>
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('lecturers.destroy', $lecturer->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this lecturer?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 dark:text-red-500 hover:underline flex items-center">
                                    <i class="fa-solid fa-trash mr-2"></i> <!-- Icon Delete -->
                                    <span>Delete</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
