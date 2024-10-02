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
                        <h3 class="font-bold text-lg mb-4">User Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                          <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Name</p>
                            <p class="text-lg font-semibold">{{ $user->name }}</p>
                          </div>
                          <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                            <p class="text-lg font-semibold">{{ $user->email }}</p>
                          </div>
                          <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Birth Place</p>
                            <p class="text-lg font-semibold">{{ $user->birth_place }}</p>
                          </div>
                          <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Birth Date</p>
                            <p class="text-lg font-semibold">{{ $user->birth_date }}</p>
                          </div>
                          <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Department</p>
                            <p class="text-lg font-semibold">{{ $user->dept }}</p>
                          </div>
                          <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Job Title</p>
                            <p class="text-lg font-semibold">{{ $user->job_title }}</p>
                          </div>
                          <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                            <p class="text-lg font-semibold">{{ $user->status }}</p>
                          </div>
                          <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Join Date</p>
                            <p class="text-lg font-semibold">{{ $user->join_date }}</p>
                          </div>
                        </div>
                        
                      <br><br>
                      <p class="text-2xl"><strong>Leave Quota:</strong> {{ Auth::user()->getLeaveQuota() }} days</p>
                      <p class="text-2xl"><strong>Leave Balance:</strong> {{ Auth::user()->getLeaveBalance() }} days</p>
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
                            <input type="date" id="start_date" name="start_date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('start_date') }}">
                            
                            @error('start_date')
                                <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                            <input type="date" id="end_date" name="end_date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('end_date') }}">
                            
                            @error('end_date')
                                <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
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
