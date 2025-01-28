@extends('layouts.main')

@section('content')
    <div class="w-4/12 mx-auto border border-gray-200 shadow-sm relativebg-white rounded-xl dark:bg-neutral-900 dark:border-neutral-700 mt-36">
        <div class="p-4 sm:p-7">
            <div class="mb-6 text-center">
                <h1 class="block mb-3 text-3xl font-bold text-gray-800 dark:text-white">Sign in</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                    Don't have an account yet?
                    <a class="font-medium text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-blue-500"
                        href="{{ route('register') }}">
                        Sign up here
                    </a>
                </p>
            </div>

            <div class="mt-5">
                <!-- Form -->
                <form method="POST" action="{{ route('loginProcess') }}">
                    @csrf
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div class="mb-6">
                            <label for="email" class="block mb-3 text-sm dark:text-white">Email address</label>
                            <div class="relative">
                                <input type="email" id="email" name="email"
                                    class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    required aria-describedby="email-error" form-control
                                    @error('email') is-invalid @enderror value="{{ old('email') }}" required
                                    autocomplete="email" autofocus placeholder="Examples@gmail.com">
                                <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                                    <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="mb-4">
                            <div class="relative mb-8 ">
                                <label for="password" class="block mb-3 text-sm dark:text-white">Password</label>
                                <input type="password" id="password" name="password"
                                    class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    required aria-describedby="password-error @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                                    <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Form Group -->
                    </div>
                    <button type="submit"
                        class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Sign
                        in</button>
            </div>
            </form>
            <!-- End Form -->
        </div>
    </div>
    </div>
@endsection
