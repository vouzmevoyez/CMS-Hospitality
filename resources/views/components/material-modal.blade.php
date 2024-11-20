<div class="relative flex justify-center hidden" id="uploadModal">
    <div class="fixed inset-0 bg-black bg-opacity-50"></div>

    <div x-show="isOpen" x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
        x-transition:leave="transition duration-150 ease-in"
        x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
        x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
        class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="relative inline-block p-4 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl sm:max-w-sm rounded-xl dark:bg-gray-900 sm:my-8 sm:w-full sm:p-6">
                <div class="text-center">
                    <h3 class="text-lg font-medium text-gray-800 dark:text-white" id="modal-title">
                        Upload Material
                    </h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">
                        Please upload the material for this course.
                    </p>
                </div>

                <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex items-center justify-between w-full mt-5 gap-x-2">
                        <input type="file" name="material"
                            class="flex-1 block h-10 px-4 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>

                    <!-- Input untuk Course Name -->
                    <div class="mt-4">
                        <label for="course_name" class="block text-sm font-medium text-gray-700">Course</label>
                        <input type="text" id="course_name" name="course_name" readonly
                            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                    </div>

                    <!-- Input untuk Lecturer Name -->
                    <div class="mt-4">
                        <label for="lecturer_name" class="block text-sm font-medium text-gray-700">Lecturer</label>
                        <input type="text" id="lecturer_name" name="lecturer_name" readonly
                            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                    </div>

                    <!-- Input untuk Schedule ID -->
                    <input type="hidden" id="schedule_id_input" name="schedule_id">

                    <!-- Input untuk Course ID (hidden) -->
                    <input type="hidden" id="course_id" name="course_id">

                    <!-- Input untuk Lecturer ID (hidden) -->
                    <input type="hidden" id="lecturer_id" name="lecturer_id">


                    <div class="mt-4 sm:flex sm:items-center sm:justify-between sm:mt-6 sm:-mx-2">
                        <button type="button" id="closeModal"
                            class="px-4 sm:mx-2 w-full py-2.5 text-sm font-medium text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md hover:bg-gray-100 focus:outline-none focus:ring">
                            Cancel
                        </button>

                        <button type="submit"
                            class="px-4 sm:mx-2 w-full py-2.5 mt-3 sm:mt-0 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-red-500 focus:outline-none focus:ring focus:ring-blue-300">
                            Confirm
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
