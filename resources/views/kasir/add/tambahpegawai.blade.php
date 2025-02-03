@extends('layouts.main')
@section('content')
<!-- Comment Form -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="max-w-2xl mx-auto">
    <div class="text-center">
      <h2 class="text-xl font-bold text-gray-800 sm:text-3xl dark:text-white">
        Add New Employee
      </h2>
    </div>

    <!-- Card -->
    <div class="relative z-10 p-4 mt-5 bg-white border rounded-xl sm:mt-10 md:p-10 dark:bg-neutral-900 dark:border-neutral-700">
      <form action="{{ route('TambahPegawaiProces') }}" method="POST">
        @csrf
        <div class="mb-4 sm:mb-8">
          <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium dark:text-white">Username</label>
          <input type="text" id="hs-feedback-post-comment-name-1" class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Username" name="username" autocomplete="off">
        </div>

        <div class="mb-4 sm:mb-8">
          <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium dark:text-white">Email</label>
          <input type="email" id="hs-feedback-post-comment-name-1" class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Email" name="email" autocomplete="off">
        </div>

        <div class="mb-4 sm:mb-8">
          <label for="hs-feedback-post-comment-email-1" class="block mb-2 text-sm font-medium dark:text-white">Password</label>
          <input type="password" id="hs-feedback-post-comment-email-1" class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Password" name="password">
        </div>
        <div class="grid mt-6">
          <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Submit</button>
        </div>
      </form>
    </div>
    <!-- End Card -->
  </div>
</div>
<!-- End Comment Form -->
@endsection
