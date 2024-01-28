@extends('layouts.main')

@section('content')

<div class="relative overflow-x-auto pt-10 pb-10">
    @if (Auth::user()->role->name == 'admin')
    <div class="ml-auto text-right mb-5">
        <a class="rounded-md bg-slate-800 text-white border border-1 hover:bg-slate-600 hover:text-white p-3 " href="{{ route('matches.create') }}">Add new match</a>
    </div>
    @endif
    <table class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Host
                </th>
                <th scope="col" class="px-6 py-3">
                    Guest
                </th>
                <th scope="col" class="px-6 py-3">
                    Result
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                @if (Auth::user()->role->name == 'admin')
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    @foreach ($teams as $team)
                    @if($team->id == $game->home_team_id)
                    {{ $team->name }}
                    @endif
                    @endforeach
                </th>
                <td class="px-6 py-4 font-normal">
                    @foreach ($teams as $team)
                    @if($team->id == $game->guest_team_id)
                    {{ $team->name }}
                    @endif
                    @endforeach
                </td>
                <td class="px-6 py-4">
                    {{ $game->host_score }} - {{ $game->guest_score }}
                </td>
                <td class="px-6 py-4">
                    {{ $game->date }}
                </td>
                @if (Auth::user()->role->name == 'admin')
                <td class="px-6 py-4">
                    <a href="{{ route('matches.edit', $game->id) }}" class="font-light text-blue-600 dark:text-blue-500 hover:underline text-lg ml-2">Edit</a>
                    <form action="{{ route('matches.destroy', $game->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-light text-blue-600 dark:text-blue-500 hover:underline text-lg ml-2">Delete</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection