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
                  <div class="mt-4">
                      <h3 class="font-bold text-lg">User Information</h3>
                      <p><strong>Name:</strong> {{ $user->name }}</p>
                      <p><strong>Email:</strong> {{ $user->email }}</p>
                      <p><strong>Birth Place:</strong> {{ $user->birth_place }}</p>
                      <p><strong>Birth Date:</strong> {{ $user->birth_date }}</p>
                      <p><strong>Department:</strong> {{ $user->dept }}</p>
                      <p><strong>Job Title:</strong> {{ $user->job_title }}</p>
                      <p><strong>Status:</strong> {{ $user->status }}</p>
                      <p><strong>Join Date:</strong> {{ $user->join_date }}</p>
                      <p><strong>Leave Balance:</strong> {{ $leaveBalance }} days</p>
                  </div>

                  <br><br><br>

                  <div class="mt-8">
                    <h3 class="font-bold text-lg">Leave Requests</h3>
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Start Date</th>
                                <th class="px-4 py-2">End Date</th>
                                <th class="px-4 py-2">Days Requested</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaveRequests as $request)
                                <tr>
                                    <td class="border px-4 py-2">{{ $request->start_date }}</td>
                                    <td class="border px-4 py-2">{{ $request->end_date }}</td>
                                    <td class="border px-4 py-2">{{ $request->days_requested }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>

                  <br><br><br>

                  <div class="mt-8">
                    <h3 class="font-bold text-lg">Apply for Leave</h3>

                    <form method="POST" action="{{ route('leave.store') }}">
                        @csrf

                        <div class="mt-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                            <input type="date" id="start_date" name="start_date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mt-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                            <input type="date" id="end_date" name="end_date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mt-6">
                          <button type="submit" class="px-4 py-2 bg-gray-200 text-black dark:bg-gray-700 dark:text-gray-200 font-semibold rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 shadow-lg transform hover:scale-105 transition-transform duration-300">Submit Leave Request</button>
                        </div>
                    </form>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
