<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('User Information') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form method="POST" action="{{ route('user.info.store') }}">
            @csrf

            <!-- Birth Place -->
            <div class="mt-4">
              <label for="birth_place" class="block font-medium text-sm text-gray-700">Birth Place</label>
              <input type="text" id="birth_place" name="birth_place" class="form-input w-full rounded-md shadow-sm" required>
            </div>

            <!-- Birth Date -->
            <div class="mt-4">
              <label for="birth_date" class="block font-medium text-sm text-gray-700">Birth Date</label>
              <input type="date" id="birth_date" name="birth_date" class="form-input w-full rounded-md shadow-sm" required>
            </div>

            <!-- Department -->
            <div class="mt-4">
              <label for="dept" class="block font-medium text-sm text-gray-700">Department</label>
              <input type="text" id="dept" name="dept" class="form-input w-full rounded-md shadow-sm" required>
            </div>

            <!-- Job Title -->
            <div class="mt-4">
              <label for="job_title" class="block font-medium text-sm text-gray-700">Job Title</label>
              <input type="text" id="job_title" name="job_title" class="form-input w-full rounded-md shadow-sm" required>
            </div>

            <!-- Status -->
            <div class="mt-4">
              <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
              <input type="text" id="status" name="status" class="form-input w-full rounded-md shadow-sm" required>
            </div>

            <!-- Join Date -->
            <div class="mt-4">
              <label for="join_date" class="block font-medium text-sm text-gray-700">Join Date</label>
              <input type="date" id="join_date" name="join_date" class="form-input w-full rounded-md shadow-sm" required>
            </div>

            <!-- Sex -->
            <div class="mt-4">
              <label class="block font-medium text-sm text-gray-700">Sex</label>
              <div class="flex items-center mt-2">
                <input type="radio" id="sex_male" name="sex" value="M" class="form-radio" required>
                <label for="sex_male" class="ml-2">Male</label>
              </div>
              <div class="flex items-center mt-2">
                <input type="radio" id="sex_female" name="sex" value="F" class="form-radio" required>
                <label for="sex_female" class="ml-2">Female</label>
              </div>
            </div>

            <div class="mt-6">
              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700">
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
