@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                        Room
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Material
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                            {{ $schedule->room }}
                        </td>
                        <td class="px-6 py-4">
                            <!-- Kontainer Flex untuk Tombol dan Ikon -->
                            <div class="flex items-center space-x-2">
                                <button
                                    class="openModal flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-red-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
                                    data-schedule-id="{{ $schedule->id }}" data-course-id="{{ $schedule->course->id }}"
                                    data-course-name="{{ $schedule->course->name }}"
                                    data-lecturer-id="{{ $schedule->lecturer->id }}"
                                    data-lecturer-name="{{ $schedule->lecturer->name }}">
                                    <i class="fa-solid fa-file-arrow-up mx-1"></i>
                                    <span class="mx-1">Upload</span>
                                </button>


                                <!-- Ikon Status Upload (Check atau X) -->
                                @if ($schedule->material && $schedule->material->is_uploaded)
                                    <!-- Jika sudah diupload, tampilkan Check mark -->
                                    <i class="fa-solid fa-circle-check text-green-500"></i>
                                @else
                                    <!-- Jika belum diupload, tampilkan X mark -->
                                    <i class="fa-solid fa-circle-xmark text-red-500"></i>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <!-- Kontainer Flex untuk Tombol dan Ikon -->
                            <div class="flex items-center space-x-2">
                                <button
                                    class="openModalStatus flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform
                                    @if ($schedule->status_id == 1) bg-green-700 hover:bg-green-800
                                    @elseif ($schedule->status_id == 2) bg-gray-400 hover:bg-gray-500
                                    @elseif ($schedule->status_id == 3) bg-yellow-500 hover:bg-yellow-600  <!-- Kuning untuk Dimulai -->
                                    @elseif ($schedule->status_id == 4) bg-teal-500 hover:bg-teal-600
                                    @else bg-gray-500 hover:bg-gray-600 @endif rounded-lg focus:outline-none focus:ring focus:ring-opacity-80"
                                    data-schedule-id="{{ $schedule->id }}" data-status-id="{{ $schedule->status_id }}">

                                    <!-- Ikon Berdasarkan status_id -->
                                    @if ($schedule->status_id == 1)
                                        <!-- Status Ada (Tersedia) -->
                                        <i class="fa-solid fa-circle-check mx-1"></i>
                                        <span class="mx-1">Ada</span>
                                    @elseif ($schedule->status_id == 2)
                                        <!-- Status Tidak Ada (Tidak Tersedia) -->
                                        <i class="fa-solid fa-circle-xmark mx-1"></i>
                                        <span class="mx-1">Tidak Ada</span>
                                    @elseif ($schedule->status_id == 3)
                                        <!-- Status Dimulai (Mulai) - Menggunakan Kuning -->
                                        <i class="fa-solid fa-clock mx-1"></i>
                                        <span class="mx-1">Dimulai</span>
                                    @elseif ($schedule->status_id == 4)
                                        <!-- Status Selesai -->
                                        <i class="fa-solid fa-circle-check mx-1"></i>
                                        <span class="mx-1">Selesai</span>
                                    @else
                                        <!-- Status Tidak Dikenal -->
                                        <i class="fa-solid fa-circle-xmark mx-1"></i>
                                        <span class="mx-1">Status Tidak Dikenal</span>
                                    @endif
                                </button>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('components.material-modal')
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

            // Modal upload
            const modalUpload = document.getElementById('uploadModal');
            const closeUploadModalButton = document.getElementById('closeModal');
            const uploadButtons = document.querySelectorAll('.openModal');

            uploadButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    fillUploadModal(button);
                    openModal(modalUpload);
                });
            });

            closeUploadModalButton.addEventListener('click', () => {
                closeModal(modalUpload);
            });

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
