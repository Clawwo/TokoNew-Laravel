@extends('layouts.main')

@section('content')
    <div
        class="w-4/12 mx-auto bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
        <div class="p-4 sm:p-7">
            <div class="mb-6 text-center">
                <h1 class="block mb-3 text-3xl font-bold text-gray-800 dark:text-white">Register</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                    Already have an account?
                    <a class="font-medium text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-blue-500"
                        href="{{ route('login') }}">
                        Sign in here
                    </a>
                </p>
            </div>

            <div class="mt-5">
                <!-- Form -->
                <form method="POST" action="{{ route('registerProcess') }}">
                    @csrf
                    <div class="grid gap-y-4">
                        <!-- Username -->
                        <div class="mb-6">
                            <label for="username" class="block mb-3 text-sm dark:text-white">Username</label>
                            <input id="username" type="text" name="username"
                                class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-6">
                            <label for="email" class="block mb-3 text-sm dark:text-white">Email</label>
                            <input id="email" type="email" name="email"
                                class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-6">
                            <label for="password" class="block mb-3 text-sm dark:text-white">Password</label>
                            <input id="password" type="password" name="password"
                                class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                required autocomplete="new-password">
                            @error('password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-6">
                            <label for="password-confirm" class="block mb-3 text-sm dark:text-white">Confirm
                                Password</label>
                            <input id="password-confirm" type="password" name="password_confirmation"
                                class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                required autocomplete="new-password">
                        </div>

                        <!-- Role -->
                        <div class="mb-6">
                            <label for="role" class="block mb-3 text-sm dark:text-white">Role</label>
                            <select id="role" name="role"
                                class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:ring-neutral-600"
                                required>
                                <option value="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Pegawai">Pegawai</option>
                            </select>
                            @error('role')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit"
                        class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                        Register
                    </button>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
@endsection
