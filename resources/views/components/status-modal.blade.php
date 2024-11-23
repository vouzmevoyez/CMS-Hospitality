<div class="relative flex justify-center hidden" id="statusModal">
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
                        Select Status
                    </h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">
                        Please select the status.
                    </p>
                </div>

                <form id="updateStatusForm" method="POST" action="/api/schedules/{{ $schedule->id ?? '' }}">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Status
                        </label>
                        <select name="status_id" id="status"
                            class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="1"
                                {{ isset($schedule) && $schedule->status_id == 1 ? 'selected' : '' }}>Ada</option>
                            <option value="2"
                                {{ isset($schedule) && $schedule->status_id == 2 ? 'selected' : '' }}>Tidak Ada
                            </option>
                            <option value="3"
                                {{ isset($schedule) && $schedule->status_id == 3 ? 'selected' : '' }}>Dimulai</option>
                            <option value="4"
                                {{ isset($schedule) && $schedule->status_id == 4 ? 'selected' : '' }}>Selesai</option>
                            <!-- Default empty option if schedule is null -->
                            <option value="" {{ !isset($schedule) ? 'selected' : '' }}>Kosong</option>
                        </select>
                    </div>

                    <div class="mt-4 sm:flex sm:items-center sm:justify-between sm:mt-6 sm:-mx-2">
                        <button type="button" id="closeStatusModal"
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
