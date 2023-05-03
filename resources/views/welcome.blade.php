<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite('resources/js/app.js')

  <title>Vestry</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="antialiased bg-neutral-100 min-h-screen w-full flex flex-col overflow-y-scroll">
  <x-navbar />

  <div class="flex-1 flex flex-col px-12 items-center ">
    <h1 class="text-yellow-500 font-semibold text-7xl my-4  text-center font-righteous">Vestry</h1>
    @if (auth('pendana')->check() || auth('pengusaha')->check() || auth('admin')->check())
      <x-home-auth />
    @endif
    @if (!auth('pendana')->check() && !auth('pengusaha')->check() && !auth('admin')->check())
      <x-home-guest />
    @endif
  </div>

</body>

</html>
