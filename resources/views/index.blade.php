@extends('layouts.main')

@section('content')
<h1 class="mb-10 text-3xl text-center mt-10 font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
    Welcome to the football registry</h1>
<div class="text-center">
    <img class="w-96 h-96 mx-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Soccer_ball.svg/2048px-Soccer_ball.svg.png" alt="ball">
</div>
<h5 class="mb-7 mt-5 text-2xl text-center font-normal leading-none tracking-tight text-gray-900 dark:text-white">Please <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('login') }}">log in</a> to
    view the Teams, Players, Matches, Results and more!</h5>
<h5 class="mb-7 mt-5 text-2xl text-center font-normal leading-none tracking-tight text-gray-900 dark:text-white">Not registered yet?
    Sign up <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('register') }}">here</a></h5>
@endsection