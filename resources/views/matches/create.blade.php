@extends('layouts.main')

@section('content')

<div class="w-2/3 mx-auto mt-10 mb-5">
  <p class="py-10 text-xl italic">Create new team:</p>
</div>
<form class="w-2/3 mx-auto pb-5" action="{{ route('matches.store') }}" method="POST">
  @csrf
  <label for="home_team_id" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Select home
    team:</label>
  <select id="home_team_id" name="home_team_id" class="my-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option disabled selected value="-1"></option>
    @foreach ($teams as $team)
    <option value="{{ $team->id }}"> {{ $team->name }} </option>
    @endforeach
  </select>
  <label for="guest_team_id" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Select guest
    team:</label>
  <select id="guest_team_id" name="guest_team_id" class="my-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option disabled selected value="-1"></option>
    @foreach ($teams as $team)
    <option value="{{ $team->id }}"> {{ $team->name }} </option>
    @endforeach
  </select>
  <div class="mb-6">
    <label for="date" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Date</label>
    <input type="date" id="date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div class="mb-6">
    <label for="host_score" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Host score</label>
    <input type="number" id="host_score" name="host_score" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div class="mb-6">
    <label for="guest_score" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Guest score</label>
    <input type="number" id="guest_score" name="guest_score" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

@endsection