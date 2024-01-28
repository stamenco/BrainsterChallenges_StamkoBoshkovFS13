@extends('layouts.main')

@section('content')

<div class="relative overflow-x-auto pt-10 pb-10">
    <div class="ml-auto text-right mb-5">
        <a class="rounded-md bg-slate-800 text-white border border-1 hover:bg-slate-600 hover:text-white p-3 " href="{{ route('players.create') }}">Add new player</a>
    </div>
    <table class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Date of birth
                </th>
                <th scope="col" class="px-6 py-3">
                    Team
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $player->name }} {{ $player->surname }}
                </th>
                <td class="px-6 py-4">
                    {{ $player->date_of_birth }}
                </td>
                <td class="px-6 py-4">
                    {{ $player->team->name }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('players.edit', $player->id) }}" class="font-light text-blue-600 dark:text-blue-500 hover:underline text-lg ml-2">Edit</a>
                    <form action="{{ route('players.destroy', $player->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-light text-blue-600 dark:text-blue-500 hover:underline text-lg ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection