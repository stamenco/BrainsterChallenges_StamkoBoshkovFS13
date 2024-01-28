@extends('layouts.main')

@section('content')

<div class="relative overflow-x-auto pt-10 pb-10">
    <div class="ml-auto text-right mb-5">
        <a class="rounded-md bg-slate-800 text-white border border-1 hover:bg-slate-600 hover:text-white p-3 " href="{{ route('teams.create') }}">Add new team</a>
    </div>
    <table class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Team
                </th>
                <th scope="col" class="px-6 py-3">
                    Founded in
                </th>
                <th scope="col" class="px-6 py-3">
                    Players
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $team->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $team->founded_in }}
                </td>
                <td class="px-6 py-4">
                    @foreach ($team->player as $player )
                    {{ $player->name }} {{ $player->surname }} |

                    @endforeach
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('teams.edit', $team->id) }}" class="font-light text-blue-600 dark:text-blue-500 hover:underline text-lg ml-2">Edit</a>
                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="inline">
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