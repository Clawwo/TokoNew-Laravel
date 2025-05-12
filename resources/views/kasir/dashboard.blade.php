@extends('layouts.main')

@section('content')
    @include('components.sidebar')

    <div class="sm:ml-64">
        <div class="p-4 mx-auto">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
                <!-- Avg. Client Rating Card -->
                <div
                    class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-2xl dark:border-gray-800 dark:bg-gray-800 hover:shadow-lg hover:border-blue-500">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-900/30">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.80443 5.60156C7.59109 5.60156 6.60749 6.58517 6.60749 7.79851C6.60749 9.01185 7.59109 9.99545 8.80443 9.99545C10.0178 9.99545 11.0014 9.01185 11.0014 7.79851C11.0014 6.58517 10.0178 5.60156 8.80443 5.60156ZM5.10749 7.79851C5.10749 5.75674 6.76267 4.10156 8.80443 4.10156C10.8462 4.10156 12.5014 5.75674 12.5014 7.79851C12.5014 9.84027 10.8462 11.4955 8.80443 11.4955C6.76267 11.4955 5.10749 9.84027 5.10749 7.79851ZM4.86252 15.3208C4.08769 16.0881 3.70377 17.0608 3.51705 17.8611C3.48384 18.0034 3.5211 18.1175 3.60712 18.2112C3.70161 18.3141 3.86659 18.3987 4.07591 18.3987H13.4249C13.6343 18.3987 13.7992 18.3141 13.8937 18.2112C13.9797 18.1175 14.017 18.0034 13.9838 17.8611C13.7971 17.0608 13.4132 16.0881 12.6383 15.3208C11.8821 14.572 10.6899 13.955 8.75042 13.955C6.81096 13.955 5.61877 14.572 4.86252 15.3208ZM3.8071 14.2549C4.87163 13.2009 6.45602 12.455 8.75042 12.455C11.0448 12.455 12.6292 13.2009 13.6937 14.2549C14.7397 15.2906 15.2207 16.5607 15.4446 17.5202C15.7658 18.8971 14.6071 19.8987 13.4249 19.8987H4.07591C2.89369 19.8987 1.73504 18.8971 2.05628 17.5202C2.28015 16.5607 2.76117 15.2906 3.8071 14.2549ZM15.3042 11.4955C14.4702 11.4955 13.7006 11.2193 13.0821 10.7533C13.3742 10.3314 13.6054 9.86419 13.7632 9.36432C14.1597 9.75463 14.7039 9.99545 15.3042 9.99545C16.5176 9.99545 17.5012 9.01185 17.5012 7.79851C17.5012 6.58517 16.5176 5.60156 15.3042 5.60156C14.7039 5.60156 14.1597 5.84239 13.7632 6.23271C13.6054 5.73284 13.3741 5.26561 13.082 4.84371C13.7006 4.37777 14.4702 4.10156 15.3042 4.10156C17.346 4.10156 19.0012 5.75674 19.0012 7.79851C19.0012 9.84027 17.346 11.4955 15.3042 11.4955ZM19.9248 19.8987H16.3901C16.7014 19.4736 16.9159 18.969 16.9827 18.3987H19.9248C20.1341 18.3987 20.2991 18.3141 20.3936 18.2112C20.4796 18.1175 20.5169 18.0034 20.4837 17.861C20.2969 17.0607 19.913 16.088 19.1382 15.3208C18.4047 14.5945 17.261 13.9921 15.4231 13.9566C15.2232 13.6945 14.9995 13.437 14.7491 13.1891C14.5144 12.9566 14.262 12.7384 13.9916 12.5362C14.3853 12.4831 14.8044 12.4549 15.2503 12.4549C17.5447 12.4549 19.1291 13.2008 20.1936 14.2549C21.2395 15.2906 21.7206 16.5607 21.9444 17.5202C22.2657 18.8971 21.107 19.8987 19.9248 19.8987Z"
                                        fill=""></path>
                                </svg>
                            </svg>
                        </div>
                        <span
                            class="px-3 py-1 text-xs font-medium text-blue-600 bg-blue-100 rounded-full dark:bg-blue-900/50 dark:text-blue-300">
                            +20% vs last month
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Avg. Client Rating</h3>
                        <div class="flex items-end mt-2 space-x-2">
                            <p class="text-3xl font-bold text-gray-800 dark:text-white">7.8</p>
                            <span class="text-lg text-gray-500 dark:text-gray-400">/10</span>
                        </div>
                    </div>
                </div>

                <!-- Instagram Followers Card -->
                <div
                    class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-2xl dark:border-gray-800 dark:bg-gray-800 hover:shadow-lg hover:border-purple-500">
                    <div class="flex items-center justify-between">
                        <div
                            class="flex items-center justify-center w-12 h-12 rounded-xl bg-purple-50 dark:bg-purple-900/30">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.665 3.75621C11.8762 3.65064 12.1247 3.65064 12.3358 3.75621L18.7807 6.97856L12.3358 10.2009C12.1247 10.3065 11.8762 10.3065 11.665 10.2009L5.22014 6.97856L11.665 3.75621ZM4.29297 8.19203V16.0946C4.29297 16.3787 4.45347 16.6384 4.70757 16.7654L11.25 20.0366V11.6513C11.1631 11.6205 11.0777 11.5843 10.9942 11.5426L4.29297 8.19203ZM12.75 20.037L19.2933 16.7654C19.5474 16.6384 19.7079 16.3787 19.7079 16.0946V8.19202L13.0066 11.5426C12.9229 11.5844 12.8372 11.6208 12.75 11.6516V20.037ZM13.0066 2.41456C12.3732 2.09786 11.6277 2.09786 10.9942 2.41456L4.03676 5.89319C3.27449 6.27432 2.79297 7.05342 2.79297 7.90566V16.0946C2.79297 16.9469 3.27448 17.726 4.03676 18.1071L10.9942 21.5857L11.3296 20.9149L10.9942 21.5857C11.6277 21.9024 12.3732 21.9024 13.0066 21.5857L19.9641 18.1071C20.7264 17.726 21.2079 16.9469 21.2079 16.0946V7.90566C21.2079 7.05342 20.7264 6.27432 19.9641 5.89319L13.0066 2.41456Z"
                                        fill=""></path>
                                </svg>
                            </svg>
                        </div>
                        <span
                            class="px-3 py-1 text-xs font-medium text-purple-600 bg-purple-100 rounded-full dark:bg-purple-900/50 dark:text-purple-300">
                            +3.59% vs last month
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Instagram Followers</h3>
                        <p class="mt-2 text-3xl font-bold text-gray-800 dark:text-white">5,934</p>
                    </div>
                </div>

                <!-- Total Revenue Card -->
                <div
                    class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-2xl dark:border-gray-800 dark:bg-gray-800 hover:shadow-lg hover:border-green-500">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-green-50 dark:bg-green-900/30">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="px-3 py-1 text-xs font-medium text-green-600 bg-green-100 rounded-full dark:bg-green-900/50 dark:text-green-300">
                            +15% vs last month
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Revenue</h3>
                        <p class="mt-2 text-3xl font-bold text-gray-800 dark:text-white">$9,758</p>
                    </div>
                </div>
            </div>

            <!-- Graph Section -->
            <div class="p-6 mb-8 bg-white border border-gray-200 rounded-2xl dark:border-gray-800 dark:bg-gray-800">
                <div class="flex flex-col justify-between mb-6 md:flex-row md:items-center">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Impression & Data Traffic</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Jun 1, 2024 - Dec 1, 2025</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <div class="inline-flex rounded-md shadow-sm" role="group">
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-l-lg hover:bg-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-500">
                                Daily
                            </button>
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600">
                                Weekly
                            </button>
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600">
                                Monthly
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Chart Placeholder -->
                <div class="p-4 mb-6 bg-gray-50 rounded-xl dark:bg-gray-700/50">
                    <div class="flex items-center justify-center h-64">
                        <p class="text-gray-500 dark:text-gray-400">Chart visualization will appear here</p>
                    </div>
                </div>

                <div
                    class="flex flex-col justify-between pt-4 border-t border-gray-200 dark:border-gray-700 md:flex-row md:items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Revenue</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">$9,758.00</p>
                    </div>
                    <div class="mt-4 md:mt-0 md:text-right">
                        <p class="text-sm font-medium text-red-500">-7.96% from last period</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Updated just now</p>
                    </div>
                </div>
            </div>

            <!-- Traffic Stats Section -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- New Subscribers -->
                <div class="p-6 bg-white border border-gray-200 rounded-2xl dark:border-gray-800 dark:bg-gray-800">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">New Subscribers</h3>
                        <span
                            class="px-3 py-1 text-xs font-medium text-red-600 bg-red-100 rounded-full dark:bg-red-900/50 dark:text-red-300">
                            -13.85% vs last week
                        </span>
                    </div>
                    <div class="flex items-end justify-between">
                        <p class="text-3xl font-bold text-gray-800 dark:text-white">567K</p>
                        <div class="flex items-center text-red-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium">5.39%</span>
                        </div>
                    </div>
                    <div class="mt-6 h-36">
                        <!-- Mini chart placeholder -->
                        <div class="h-full bg-gray-100 rounded-lg dark:bg-gray-700/50"></div>
                    </div>
                </div>

                <!-- Conversion Rate -->
                <div class="p-6 bg-white border border-gray-200 rounded-2xl dark:border-gray-800 dark:bg-gray-800">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Conversion Rate</h3>
                        <span
                            class="px-3 py-1 text-xs font-medium text-red-600 bg-red-100 rounded-full dark:bg-red-900/50 dark:text-red-300">
                            -5.39% vs last week
                        </span>
                    </div>
                    <div class="flex items-end justify-between">
                        <p class="text-3xl font-bold text-gray-800 dark:text-white">276K</p>
                        <div class="flex items-center text-red-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium">5.39%</span>
                        </div>
                    </div>
                    <div class="mt-6 h-36">
                        <!-- Mini chart placeholder -->
                        <div class="h-full bg-gray-100 rounded-lg dark:bg-gray-700/50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
