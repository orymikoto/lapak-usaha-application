<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')

  <title>Vestry</title>
</head>

<script>
  function reveal() {
    var reveals = document.querySelectorAll(".item");

    for (var i = 0; i < reveals.length; i++) {
      var windowHeight = window.innerHeight;
      var elementTop = reveals[i].getBoundingClientRect().top;
      var elementVisible = 100;

      if (elementTop < windowHeight - elementVisible) {
        reveals[i].classList.add("animate-fade-in-left", "opacity-100");
      } else {
        reveals[i].classList.remove("animate-fade-in-left", "opacity-100");
      }
    }
  }

  window.addEventListener("scroll", reveal);
</script>

<body class="antialiased bg-neutral-100 min-h-screen w-full flex flex-col overflow-y-scroll overflow-x-hidden">
  <x-navbar />
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="/pendanaan/{{ auth('pendana')->check() ? auth('pendana')->user()->id_pendana : '' }}{{ auth('pengusaha')->check() ? auth('pengusaha')->user()->id_pemilik_usaha : '' }}"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">close</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif
  <div class="flex flex-col items-center flex-1">
    <div class="flex rounded-full bg-neutral-400 text-neutral-700  w-[35rem] my-2 overflow-hidden font-medium font-roboto">
      <a href="{{ url()->current() . '?menu=0' }}"
        class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 cursor-pointer text-center {{ request()->get('menu') == 0 || request()->get('menu') == null ? 'bg-yellow-500 text-white' : '' }}">Semua</a>
      <a href="{{ url()->current() . '?menu=1' }}"
        class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 cursor-pointer text-center {{ request()->get('menu') == 1 ? 'bg-yellow-500 text-white' : '' }}">Sedang
        Berjalan</a>
      <a href="{{ url()->current() . '?menu=2' }}"
        class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 cursor-pointer text-center {{ request()->get('menu') == 2 ? 'bg-yellow-500 text-white' : '' }}">Diajukan</a>
      <a href="{{ url()->current() . '?menu=3' }}"
        class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 cursor-pointer text-center {{ request()->get('menu') == 3 ? 'bg-yellow-500 text-white' : '' }}">Selesai</a>
    </div>
    <div class="my-4 flex-col flex md:w-[90vw] gap-4">
      @if (count($daftarPendanaan) > 0)
        @php
          $total = 0;
        @endphp
        @foreach ($daftarPendanaan as $key => $value)
          @if (request()->get('menu') == 0 || request()->get('menu') == null)
            <x-item-pendanaan :value="$value" :key="$total" />
            @php
              $total += 1;
            @endphp
          @elseif (request()->get('menu') == 1 && $value->id_status_pendanaan == 2)
            <x-item-pendanaan :value="$value" :key="$total" />
            @php
              $total += 1;
            @endphp
          @elseif (request()->get('menu') == 2 && $value->id_status_pendanaan == 1)
            <x-item-pendanaan :value="$value" :key="$total" />
            @php
              $total += 1;
            @endphp
          @elseif (request()->get('menu') == 3 && $value->id_status_pendanaan == 3)
            <x-item-pendanaan :value="$value" :key="$total" />
            @php
              $total += 1;
            @endphp
          @elseif($key == count($daftarPendanaan) - 1 && $total == 0)
            <div class="w-[90vw] h-[20rem] flex flex-col items-center justify-center rounded-lg bg-white">
              <h2 class="text-neutral-700 font-righteous text-xl">Nothing to Show Here Yet</h2>
              <img src="/images/nothing.jpg" class="h-[15rem]" alt="" srcset="">
            </div>
          @endif
        @endforeach
      @else
        <div class="w-[90vw] h-[20rem] flex flex-col items-center justify-center rounded-lg bg-white">
          <h2 class="text-neutral-700 font-righteous text-xl">This User Don't Have Any Pendanaan Yet</h2>
          <img src="/images/nothing.jpg" class="h-[15rem]" alt="" srcset="">
        </div>
      @endif

    </div>
  </div>

</body>

</html>
