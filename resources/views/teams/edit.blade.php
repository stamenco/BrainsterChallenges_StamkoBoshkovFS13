@extends('layouts.main')

@section('content')

<div class="w-2/3 mx-auto mt-10 mb-5">
  <p class="py-10 text-xl italic">Update team:</p>
</div>
<form class="w-2/3 mx-auto pb-5" action="{{ route('teams.update', $team->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-6">
    <label for="name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Name</label>
    <input type="text" id="name" name="name" value="{{ $team->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div class="mb-6">
    <label for="founded_in" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Year founded</label>
    <input type="date" id="founded_in" name="founded_in" value="{{ $team->founded_in }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

@endsection