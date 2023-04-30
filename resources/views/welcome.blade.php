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

<body class="antialiased bg-neutral-100 min-h-screen w-full flex flex-col">
  <x-navbar />

  <div class="flex-1 flex flex-col px-12 items-center ">
    <h1 class="text-yellow-500 font-semibold text-5xl my-4  text-center">Vestry Application</h1>
    <div class=" grid grid-cols-12 gap-4 bg-white mt-20 rounded-md p-4 md:w-[42rem] sm:w-[32rem] w-[20rem] shadow-md shadow-black/50">
      <div class="md:col-span-3 sm:col-span-6 col-span-full flex flex-col gap-y-2 items-center justify-start h-full text-center">
        <img src="" class="w-10 h-10 object-contain object-center" alt="">
        <h3 class="text-amber-400 font-medium">Judul Fitur</h3>
        <p class="text-neutral-400 text-sm font-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima, quia?</p>
      </div>
      <div class="md:col-span-3 sm:col-span-6 col-span-full flex flex-col gap-y-2 items-center justify-start h-full text-center">
        <img src="" class="w-10 h-10 object-contain object-center" alt="">
        <h3 class="text-amber-400 font-medium">Judul Fitur</h3>
        <p class="text-neutral-400 text-sm font-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima, quia?</p>
      </div>
      <div class="md:col-span-3 sm:col-span-6 col-span-full flex flex-col gap-y-2 items-center justify-start h-full text-center">
        <img src="" class="w-10 h-10 object-contain object-center" alt="">
        <h3 class="text-amber-400 font-medium">Judul Fitur</h3>
        <p class="text-neutral-400 text-sm font-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima, quia?</p>
      </div>
      <div class="md:col-span-3 sm:col-span-6 col-span-full flex flex-col gap-y-2 items-center justify-start h-full text-center">
        <img src="" class="w-10 h-10 object-contain object-center" alt="">
        <h3 class="text-amber-400 font-medium">Judul Fitur</h3>
        <p class="text-neutral-400 text-sm font-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima, quia?</p>
      </div>
    </div>
    <div
      class="w-[21rem] cursor-pointer my-4 font-bold text-center py-2 bg-yellow-500 text-xl text-white hover:shadow-md hover:shadow-black/40 hover:text-yellow-500 hover:bg-white rounded-full duration-200">
      START USING VESTRY
    </div>
  </div>
</body>

</html>
