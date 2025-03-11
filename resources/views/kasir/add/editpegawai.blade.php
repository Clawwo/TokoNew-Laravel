@extends('layouts.main')

@section('content')
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                    Edit Pegawai
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Update informasi pegawai di bawah ini.
                </p>
            </div>
            <!-- End Header -->

            <!-- Card -->
            <div
                class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                <div class="p-4 sm:p-7">
                    <form action="{{ route('updatePegawai', $pegawai->id_user) }}" method="POST" class="space-y-8">
                        @csrf
                        @method('patch')

                        <div class="space-y-8">
                            <!-- Username -->
                            <div class="relative group">
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                                    Username <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" id="username" name="username"
                                        class="block w-full px-4 py-3 text-sm text-gray-900 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-400"
                                        placeholder="Masukkan username" value="{{ $pegawai->username }}" required>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="relative group">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="email" id="email" name="email"
                                        class="block w-full px-4 py-3 text-sm text-gray-900 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-400"
                                        placeholder="Masukkan email" value="{{ $pegawai->email }}" required>
                                </div>
                            </div>

                            <!-- Role -->
                            <div class="relative group">
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                                    Role <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <select id="role" name="role"
                                        class="block w-full px-4 py-3 text-sm text-gray-900 bg-white border border-gray-200 rounded-lg appearance-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-100">
                                        <option value="Admin" {{ $pegawai->role == 'Admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="Pegawai" {{ $pegawai->role == 'Pegawai' ? 'selected' : '' }}>Pegawai
                                        </option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 transition-opacity duration-200 opacity-0 pointer-events-none group-hover:opacity-100">
                                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex items-center pt-4 gap-x-2">
                                <a href="{{ route('tampilPegawai') }}"
                                    class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-semibold transition-all duration-200 bg-gray-100 border border-transparent rounded-lg text-gray-800 hover:bg-gray-200 dark:focus:ring-offset-neutral-900 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 transform hover:scale-[1.02] active:scale-[0.98]">
                                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    Kembali
                                </a>

                                <button type="submit"
                                    class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-neutral-900 transform hover:scale-[1.02] active:scale-[0.98] hover:shadow-lg">
                                    <span>Update Pegawai</span>
                                    <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection
