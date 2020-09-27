<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    @isset($title)
    <title>{{ $title }} - {{ config('app.name') }}</title>
    @else
    <title>{{ config('app.name') }}</title>
    @endisset

    @isset($description)
    <meta name="description" content="{{ $description }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="og:description" content="{{ $description }}">
    @endisset

    @isset($title)
    <meta name="title" content="{{ $title }} - {{ config('app.name') }}">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="og:title" content="{{ $title }}">
    @endisset

    <meta name="keywords" content="eve-online, eve, ccp, ccp games, kills, kill, massively, multiplayer, online, role, playing, game, mmorpg, rank, isk, mmorpg, killboard, zkillboard">
    <meta name="robots" content="index,follow">
    <meta name="og:locale" content="{{ app()->getLocale() }}">
    <meta name="og:type" content="website">
    <meta name="og:site_name" content="{{ config('app.name') }}">
    <meta name="fb:app_id" content="">
    {{-- <meta name="twitter:site" content="@zKillboard"> --}}
    <meta name="twitter:domain" content="{{ config('app.url') }}">
    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="msapplication-TileColor" content="#000000" />
    <meta name="mobile-web-app-capable" content="yes">
    {{-- <link rel="shortcut icon" sizes="16x16" href="//zkillboard.com/favicon.ico" /> --}}

    @isset($image)
    <meta name="twitter:image" content="{{ $image }}">
    <meta name="og:image" content="{{ $image }}">
    @endisset

    <meta name="twitter:card" content="summary">
    <meta name="og:url" content="{{ url()->current() }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.14.0/css/all.min.css" integrity="sha256-FMvZuGapsJLjouA6k7Eo2lusoAX9i0ShlWFG6qt7SLc=" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body>
    @inertia

    {{-- {!! ssr(mix('/js/app-ssr.js'))-> !!} --}}

    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>

