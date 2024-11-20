@extends('layouts.dashboard')

@section('title', 'DASHBOARD')

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
                            <select name="status" id="status"
                                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                <option value="ada">Ada</option>
                                <option value="dimulai">Dimulai</option>
                                <option value="selesai">Selesai</option>
                                <option value="tidak-ada" selected>Tidak Ada</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('Components.material-modal')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Ambil semua tombol dengan class 'openModal'
            const modalButtons = document.querySelectorAll('.openModal');
            const modal = document.getElementById('uploadModal'); // Modal container
            const closeModalButton = document.getElementById('closeModal');
            const scheduleIdInput = document.getElementById('schedule_id_input'); // Input untuk schedule_id
            const courseNameInput = document.getElementById('course_name'); // Input untuk course_name
            const lecturerNameInput = document.getElementById('lecturer_name'); // Input untuk lecturer_name
            const courseIdInput = document.getElementById('course_id'); // Input untuk course_id
            const lecturerIdInput = document.getElementById('lecturer_id'); // Input untuk lecturer_id

            // Tambahkan event listener untuk setiap tombol
            modalButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    // Ambil data dari tombol
                    const scheduleId = button.getAttribute('data-schedule-id');
                    const courseName = button.getAttribute('data-course-name');
                    const lecturerName = button.getAttribute('data-lecturer-name');
                    const courseId = button.getAttribute('data-course-id');
                    const lecturerId = button.getAttribute('data-lecturer-id');

                    console.log(
                        `Schedule ID: ${scheduleId}, Course Name: ${courseName}, Lecturer Name: ${lecturerName}`
                    ); // Debugging

                    // Isi input modal dengan data yang sesuai
                    scheduleIdInput.value = scheduleId;
                    courseNameInput.value = courseName; // Isi dengan nama course
                    lecturerNameInput.value = lecturerName; // Isi dengan nama lecturer
                    courseIdInput.value = courseId; // Isi dengan ID course
                    lecturerIdInput.value = lecturerId; // Isi dengan ID lecturer

                    // Tampilkan modal
                    modal.classList.remove('hidden');
                });
            });

            // Tutup modal saat tombol "Cancel" diklik
            closeModalButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        });
    </script>

@endsection
