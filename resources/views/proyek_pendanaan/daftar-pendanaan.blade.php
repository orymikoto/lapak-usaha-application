<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')

  <title>Vestry</title>
</head>
<body class="antialiased bg-neutral-100 min-h-screen w-full flex flex-col overflow-y-scroll overflow-x-hidden">
  <x-navbar />
  <div class="flex flex-col items-center flex-1">
    <div class="flex rounded-full bg-neutral-400 text-neutral-700  w-[35rem] my-2 overflow-hidden font-medium font-roboto">
      <a href="{{ url()->current() . '?menu=0'}}" class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 cursor-pointer text-center {{ request()->get('menu') == 0 || request()->get('menu') == null ? 'bg-yellow-500 text-white' : '' }}">Semua</a>
      <a href="{{ url()->current() . '?menu=1'}}" class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 cursor-pointer text-center {{ request()->get('menu') == 1 ? 'bg-yellow-500 text-white' : '' }}">Sedang Berjalan</a>
      <a href="{{ url()->current() . '?menu=2'}}" class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 cursor-pointer text-center {{ request()->get('menu') == 2 ? 'bg-yellow-500 text-white' : '' }}">Diajukan</a>
      <a href="{{ url()->current() . '?menu=3'}}" class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 cursor-pointer text-center {{ request()->get('menu') == 3 ? 'bg-yellow-500 text-white' : '' }}">Selesai</a>
    </div>
    <div class="my-4 flex-col flex md:w-[90vw]">
      @if ((request()->get('menu') == 0 || request()->get('menu') == null) && count($daftarPendanaan) > 0  )
          @foreach ( $daftarPendanaan as $key => $value )
              <div class="p-4 flex bg-white rounded-lg shadow-md">
                {{$value}}
              </div>
          @endforeach
      @endif
    </div>
  </div>
  
</body>
</html>