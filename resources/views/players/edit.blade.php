@extends('layouts.main')

@section('content')

<div class="w-2/3 mx-auto mt-10 mb-5">
  <p class="py-10 text-xl italic">Update player:</p>
</div>
<form class="w-2/3 mx-auto pb-5" action="{{ route('players.update', $player->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-6">
    <label for="name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Name</label>
    <input type="text" id="name" name="name" value="{{ $player->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div class="mb-6">
    <label for="surname" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Surname</label>
    <input type="text" id="surname" name="surname" value="{{ $player->surname }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div class="mb-6">
    <label for="date_of_birth" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Date of birth</label>
    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $player->date_of_birth }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <label for="team_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
    team:</label>
  <select id="team_id" name="team_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option disabled selected value="-1"></option>
    @foreach ($teams as $team)
    <option value="{{ $team->id }}" @if((old('team_id') !=null && old('team_id')==$team->id) || ($team->id == $player->team_id)) selected @endif > {{ $team->name }} </option>
    @endforeach
  </select>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 mt-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

@endsection