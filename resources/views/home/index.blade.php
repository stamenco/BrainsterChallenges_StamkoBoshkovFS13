@extends('layouts.main')

@section('content')
<h2 class="mb-12 mt-7 text-2xl text-center font-normal leading-none tracking-tight text-gray-900 dark:text-white">Welcome, <span class="font-semibold">{{ Auth::user()->name }}</span>. Select what you want to see:</h2>

<div class="flex flex-row justfy-center content-center">
    <div class="max-w-sm mx-5  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg w-96 h-56" src="https://www.telegraph.co.uk/content/dam/sport/2022/09/09/TELEMMGLPICT000308505349_trans_NvBQzQNjv4BqcYkxD9IY9NEIORuW6t2iaCgC04e1y4gl2yd43EQLM_8.jpeg" alt="team" />
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Football Teams</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">List through the teams and statistics.</p>
            <a href="{{ route('teams.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                View
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
    <div class="max-w-sm mx-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg w-96 h-56" src="https://qph.cf2.quoracdn.net/main-qimg-22f4d39fadddab8dcb35cc9e78c4abb9.webp" alt="player" />
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Football Players</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">List through the players and statistics.</p>
            <a href="{{ route('players.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                View
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
    <div class="max-w-sm mx-5  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg w-96 h-56" src="https://img.olympicchannel.com/images/image/private/t_16-9_640/f_auto/v1538355600/primary/lo9lg1r7jy1j2cuomcz3" alt="match" />
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Matches</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">List through the matches and results.</p>
            <a href="{{ route('matches.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                View
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

@endsection