@extends('layouts.dashboard')

@section('title', 'UKM')

@section('content')
    <div class="mb-6 mt-3">
        <a href="{{ route('ukms.create') }}"
            class="items-center px-6 py-4 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-red-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            <i class="fa-solid fa-plus-circle mx-1"></i>
            <span class="mx-1">Add UKM</span>
        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        URL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ukms as $ukm)
                    <tr class="odd:bg-white odd: even:bg-gray-50 even: border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $ukm->name }}
                        </th>
                        <td class="px-6 py-4">
                            <a href="{{ $ukm->url }}" target="_blank" class="text-blue-600 hover:text-blue-900">
                                {{ $ukm->url }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <!-- Edit and Delete buttons in one cell -->
                            <div class="flex space-x-4">
                                <!-- Edit Button -->
                                <a href="{{ route('ukms.edit', $ukm->id) }}"
                                    class="flex items-center text-blue-600 hover:text-blue-900">
                                    <i class="fa-solid fa-edit mr-2"></i> Edit
                                </a>

                                <!-- Delete Form -->
                                <form action="{{ route('ukms.destroy', $ukm->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this UKM?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
