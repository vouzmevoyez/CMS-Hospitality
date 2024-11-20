<aside
    class="fixed top-0 left-0 w-56 h-screen px-5 py-8 overflow-y-auto bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 z-10 flex flex-col">
    <a href="#">
        <img class="w-auto h-14 -mt-4 -mb-3" src="https://upload.wikimedia.org/wikipedia/commons/b/b3/Logo_resmi_UMS.svg"
            alt="">
    </a>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="-mx-3 space-y-6">
            <div class="space-y-3">
                <label class="px-3 text-xs text-gray-500 uppercase dark:text-gray-400">analytics</label>

                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Dashboard</span>
                </a>
            </div>

            <div class="space-y-3">
                <label class="px-3 text-xs text-gray-500 uppercase dark:text-gray-400">content</label>

                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="/dashboard/schedules">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="mx-2 text-sm font-medium">Schedules</span>
                </a>

                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="/dashboard/courses">
                    <i class="fa-brands fa-discourse"></i>
                    <span class="mx-2 text-sm font-medium">Courses</span>
                </a>

                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="/dashboard/lecturers">
                    <i class="fa-solid fa-user"></i>
                    <span class="mx-2 text-sm font-medium">Lecturers</span>
                </a>

                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="/dashboard/materials">
                    <i class="fa-solid fa-book"></i>
                    <span class="mx-2 text-sm font-medium">Materials</span>
                </a>

                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="/dashboard/ukm">
                    <i class="fa-solid fa-people-group"></i>
                    <span class="mx-2 text-sm font-medium">UKM</span>
                </a>
            </div>
        </nav>
        <!-- Tombol Logout di bagian bawah -->
        <div class="mt-auto">
            <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-red-500 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-white"
                href="#">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="mx-2 text-sm font-medium">Logout</span>
            </a>
        </div>
    </div>
</aside>
