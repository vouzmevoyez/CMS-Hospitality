@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Course
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lecturer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Day
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Start Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        End Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Class
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Room
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr class="odd:bg-white odd: even:bg-gray-50 even: border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $schedule->course->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $schedule->lecturer->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $schedule->day }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $schedule->start_time }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $schedule->end_time }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $schedule->class->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $schedule->room }}
                        </td>
                        <td class="px-6 py-4">
                            <!-- Kontainer Flex untuk Tombol dan Ikon -->
                            <div class="flex items-center space-x-2">
                                <button
                                    class="openModalStatus flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform
                                    @switch($schedule->status->name)
                                        @case('Ada') bg-green-700 hover:bg-green-800 @break
                                        @case('Tidak Ada') bg-gray-400 hover:bg-gray-500 @break
                                        @case('Dimulai') bg-yellow-500 hover:bg-yellow-600 @break
                                        @case('Selesai') bg-teal-500 hover:bg-teal-600 @break
                                        @default bg-gray-500 hover:bg-gray-600
                                    @endswitch
                                    rounded-lg focus:outline-none focus:ring focus:ring-opacity-80"
                                    data-schedule-id="{{ $schedule->id }}" data-status-id="{{ $schedule->status_id }}">

                                    <!-- Ikon Berdasarkan Nama Status -->
                                    @switch($schedule->status->name)
                                        @case('Ada')
                                            <i class="fa-solid fa-circle-check mx-1"></i>
                                            <span class="mx-1">Ada</span>
                                        @break

                                        @case('Tidak Ada')
                                            <i class="fa-solid fa-circle-xmark mx-1"></i>
                                            <span class="mx-1">Tidak Ada</span>
                                        @break

                                        @case('Dimulai')
                                            <i class="fa-solid fa-clock mx-1"></i>
                                            <span class="mx-1">Dimulai</span>
                                        @break

                                        @case('Selesai')
                                            <i class="fa-solid fa-circle-check mx-1"></i>
                                            <span class="mx-1">Selesai</span>
                                        @break

                                        @default
                                            <i class="fa-solid fa-circle-xmark mx-1"></i>
                                            <span class="mx-1">Status Tidak Dikenal</span>
                                    @endswitch
                                </button>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('components.status-modal')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Fungsi untuk membuka modal
            function openModal(modal) {
                modal.classList.remove('hidden');
            }

            // Fungsi untuk menutup modal
            function closeModal(modal) {
                modal.classList.add('hidden');
            }

            // Fungsi untuk mengisi input modal upload
            function fillUploadModal(button) {
                const scheduleId = button.getAttribute('data-schedule-id');
                const courseName = button.getAttribute('data-course-name');
                const lecturerName = button.getAttribute('data-lecturer-name');
                const courseId = button.getAttribute('data-course-id');
                const lecturerId = button.getAttribute('data-lecturer-id');

                document.getElementById('schedule_id_input').value = scheduleId;
                document.getElementById('course_name').value = courseName;
                document.getElementById('lecturer_name').value = lecturerName;
                document.getElementById('course_id').value = courseId;
                document.getElementById('lecturer_id').value = lecturerId;
            }

            // Modal status
            const modalStatus = document.getElementById('statusModal');
            const closeStatusModalButton = document.getElementById('closeStatusModal');
            const statusButtons = document.querySelectorAll('.openModalStatus');

            statusButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const scheduleId = button.getAttribute('data-schedule-id');
                    const currentStatus = button.getAttribute(
                        'data-status-id'); // Misalkan ada atribut ini

                    // Update action URL
                    const form = modalStatus.querySelector('form#updateStatusForm');
                    form.setAttribute('action', `/api/schedules/${scheduleId}`);

                    // Set dropdown status ke status yang sesuai
                    form.querySelector('select[name="status_id"]').value = currentStatus;

                    // Show modal
                    modalStatus.classList.remove('hidden');
                });
            });


            closeStatusModalButton.addEventListener('click', () => {
                modalStatus.classList.add('hidden');
            });

        });
    </script>

@endsection
