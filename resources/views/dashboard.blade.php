<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  {{ __("You're logged in!") }}

                  <div class="mt-4">
                      <h3 class="font-bold text-lg">User Information</h3>
                      <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                      <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                      <p><strong>Birth Place:</strong> {{ Auth::user()->birth_place }}</p>
                      <p><strong>Birth Date:</strong> {{ Auth::user()->birth_date }}</p>
                      <p><strong>Department:</strong> {{ Auth::user()->dept }}</p>
                      <p><strong>Job Title:</strong> {{ Auth::user()->job_title }}</p>
                      <p><strong>Status:</strong> {{ Auth::user()->status }}</p>
                      <p><strong>Join Date:</strong> {{ Auth::user()->join_date }}</p>
                      <p><strong>Leave Balance:</strong> {{ Auth::user()->getLeaveBalance() }} days</p>
                  </div>

                  <div class="mt-8">
                    <h3 class="font-bold text-lg">Ajukan Cuti</h3>

                    <form method="POST" action="{{ route('leave.store') }}">
                        @csrf

                        <div class="mt-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Mulai Cuti</label>
                            <input type="date" id="start_date" name="start_date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mt-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Akhir Cuti</label>
                            <input type="date" id="end_date" name="end_date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-700">Ajukan Cuti</button>
                        </div>
                    </form>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
