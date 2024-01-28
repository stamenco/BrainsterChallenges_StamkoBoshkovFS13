<!DOCTYPE html>
<html>

<head>
    <title>Football app</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    @include('partials.links')
</head>

<body>
    @include('partials.nav')
    <div class="w-full h-full bg-slate-50 border-t-4 border-t-slate-100">
        <div class="w-2/3 mx-auto">
            @include('partials.messages')
            @yield('content')
        </div>
    </div>

    @include('partials.scripts')
</body>

</html>