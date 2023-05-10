<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')

  <title>Vestry</title>
</head>

<body class="antialiased bg-neutral-100 min-h-screen w-full flex flex-col overflow-x-hidden ">
  <x-navbar />

  <div class="flex w-full flex-1 my-4 gap-x-4">
    {{-- SIDEBAR --}}
    <div
      class="md:flex max-h-[30rem] hidden flex-col w-[15rem] bg-white rounded-r-lg text-left text-lg text-yellow-500 font-medium overflow-hidden z-10 shadow-lg shadow-black/50 ">
      <div class="font-semibold text-white bg-yellow-500 py-2 font-righteous px-4 cursor-default select-none">
        <p>Daftar Menu</p>
      </div>
      <div class="flex flex-col flex-1 justify-center font-medium font-roboto">
        <a href="/daftar-usaha/pendana" class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Daftar Usaha</p>
        </a>
        <a class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Proyek Pendanaan</p>
        </a>
        <a class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Riwayat</p>
        </a>
      </div>
      <a href="/"
        class="py-2 px-4 hover:bg-red-500 bg-red-200 hover:text-white duration-200 font-semibold text-lg cursor-pointer text-red-500 ">
        Back to home
      </a>
    </div>

    {{-- DAFTAR USAHA --}}
    <div class="flex-1 flex flex-col md:pr-6 relative gap-4">
      <h1 class="text-yellow-500 font-righteous text-3xl text-center my-4">Daftar Usaha</h1>
      @foreach ($daftar_usaha_terkonfirmasi as $key => $value)
        {{-- {{ asset('storage/app/public' . $value->foto_usaha) }} --}}
        {{-- {{ asset('storage/app/public' . $value->foto_usaha) }} --}}
        <div class="flex flex-col md:flex-row md:justify-start items-center rounded-md p-2 gap-2 shadow-[4px_5px_10px_0px_rgba(0,0,0,0.5)] ">
          <img class="lg:block md:hidden block  lg:w-24 lg:h-20 w-40 h-32 rounded-md shadow-md object-cover object-center"
            src="{{ $value->id_deskripsi_usaha > 3 ? asset('/storage' . $value->foto_usaha) : $value->foto_usaha }}" alt="" srcset="">
          {{-- DETAIL USAHA --}}
          <div class="flex flex-col md:items-start items-center flex-1">
            <h2 class="font-roboto font-medium text-xl text-yellow-500">{{ $value->nama_usaha }}</h2>
            <p class="text-neutral-400 font-medium font-roboto">{{ $value->nama_jenis_usaha }}</p>
          </div>
          <div class="w-[10rem] font-roboto font-medium  text-yellow-500 ">
            <p class="w-full truncate">{{ $value->username }}</p>
          </div>
          <div
            class="flex lg:gap-0 md:gap-2 gap-0 lg:rounded-full md:rounded-none rounded-full lg:flex-row md:flex-col flex-row lg:w-[21rem] md:w-[10rem] w-[21rem] overflow-hidden lg:bg-neutral-200 md:bg-transparent bg-neutral-200 font-medium font-roboto  text-neutral-400">
            <div
              class="py-1 text-center select-none flex-1 lg:rounded-none md:rounded-full rounded-none duration-200 {{ $value->id_status_pengajuan == 2 ? 'text-white bg-emerald-400 cursor-default' : 'lg:bg-transparent md:bg-neutral-200 bg-transparent' }}">
              Terkonfirmasi</div>
            <div
              class="py-1 text-center select-none flex-1 lg:rounded-none md:rounded-full rounded-none duration-200 {{ $value->id_status_pengajuan == 1 ? 'text-white bg-red-500 cursor-default' : 'lg:bg-transparent md:bg-neutral-200 bg-transparent' }}">
              Tidak Terkonfirmasi</div>
          </div>

          {{-- ACTION --}}
          <div class="flex items-center justify-center gap-2 w-[12rem]">
            <div class="w-14 h-14 flex items-center justify-center">
              <a href="{{ $value->id_deskripsi_usaha > 3 ? asset('/storage' . $value->proposal) : $value->proposal }}">
                <img src="/icons/pdf.svg" alt="" class="w-12 h-12 cursor-pointer hover:w-14 hover:h-14 duration-300">
              </a>
            </div>
            <div class="flex w-[12rem] rounded-full bg-neutral-200 overflow-hidden">
              <a href="/pendanaan/tambah/{{ $value->id_deskripsi_usaha }}"
                class="flex-1 hover:text-white duration-200 font-medium text-center py-1 cursor-pointer text-emerald-400 hover:bg-emerald-400 font-roboto">
                Danai</a>
              <a href="/daftar-usaha/view/{{ $value->id_deskripsi_usaha }}"
                class="flex-1 hover:text-white duration-200 font-medium text-center py-1 cursor-pointer text-yellow-500 hover:bg-yellow-500 font-roboto">
                View</a>
            </div>
          </div>

        </div>
      @endforeach
    </div>
  </div>


</body>

</html>
