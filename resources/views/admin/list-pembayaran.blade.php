<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>Vestry</title>
</head>

<body class="antialiased bg-neutral-200 min-h-screen w-full flex flex-col overflow-x-hidden ">
  <x-navbar />
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="/admin/daftar-pembayaran"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">close</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif

  <div class="flex flex-col items-center flex-1 my-4 gap-x-4 mx-4">
    {{-- NAVIGATION ADMIN PAGE --}}
    <div class="flex rounded-full bg-neutral-400 w-[40rem] overflow-hidden">
      <a href="/admin/daftar-pengusaha"
        class="flex-1 hover:bg-yellow-500 text-neutral-800 font-medium font-roboto py-1 text-center cursor-pointer hover:text-white duration-200">Daftar
        Pengusaha</a>
      <a href="/admin/daftar-pendana"
        class="flex-1 hover:bg-yellow-500 text-neutral-800 font-medium font-roboto py-1 text-center cursor-pointer hover:text-white duration-200">Daftar
        Pendana
      </a>
      <a href="/admin/daftar-pembayaran" class="flex-1 bg-yellow-500 font-medium font-roboto py-1 text-center cursor-pointer text-white duration-200">
        Daftar
        Pembayaran</a>
      <a href="/admin/daftar-pencairan"
        class="flex-1 hover:bg-yellow-500 text-neutral-800 font-medium font-roboto py-1 text-center cursor-pointer hover:text-white duration-200">
        Daftar
        Pencairan</a>
    </div>

    {{-- LIST PEMBAYARAN --}}
    <div class="flex flex-col mx-4 gap-4 items-center">
      <h1 class="text-yellow-500 font-righteous text-3xl text-center mt-4">Daftar Pembayaran</h1>
      <div class="flex bg-neutral-400 text-neutral-800 w-[30rem] rounded-full overflow-hidden">
        <a href="/admin/daftar-pembayaran?menu=1"
          class="py-1 flex-1 hover:text-white hover:bg-teal-600 duration-200 text-center font-roboto font-medium {{ request()->get('menu') == 1 || request()->get('menu') == null ? 'text-white bg-teal-600' : '' }}">Semua</a>
        <a href="/admin/daftar-pembayaran?menu=2"
          class="py-1 flex-1 hover:text-white hover:bg-teal-600 duration-200 text-center font-roboto font-medium {{ request()->get('menu') == 2 ? 'text-white bg-teal-600' : '' }}">Disetujui</a>
        <a href="/admin/daftar-pembayaran?menu=3"
          class="py-1 flex-1 hover:text-white hover:bg-teal-600 duration-200 text-center font-roboto font-medium {{ request()->get('menu') == 3 ? 'text-white bg-teal-600' : '' }}">Belum
          Disetujui</a>
      </div>
      <div class="grid grid-cols-12 gap-4 my-4 ">
        @if (request()->get('menu') == 1 || request()->get('menu') == null)
          @foreach ($proyek_pendanaan as $key => $value)
            <div class="p-4 col-span-3 rounded-lg flex flex-col bg-white gap-2">
              <img src="/images/finance.jpg" class="w-full rounded-md h-[20rem] object-cover object-center" alt="">
              <h2 class="font-righteous text-xl text-center">{{ $value->deskripsiUsaha->nama_usaha }}</h2>
              <h2 class="font-roboto font-medium text-neutral-600 text-sm text-center">{{ $value->Pendana->nama }}</h2>
              <div class="flex rounded-md w-full bg-neutral-400 text-neutral-800 overflow-hidden font-roboto font-medium">
                <div
                  class="py-1 flex-1 text-center hover:text-white hover:bg-emerald-400 cursor-pointer duration-200 {{ $value->Pembayaran->status_pembayaran == 1 ? 'text-white bg-emerald-400 cursor-default' : '' }}">
                  Disetujui</div>
                <div
                  class="py-1 flex-1 text-center hover:text-white hover:bg-red-500 cursor-pointer duration-200 {{ $value->Pembayaran->status_pembayaran == 0 ? 'text-white bg-red-500 cursor-default' : '' }}">
                  Belum Disetujui</div>
              </div>
              <a href="{{ '/admin/detail-pembayaran/' . $value->Pembayaran->id_pembayaran }}"
                class="w-full py-1 font-roboto font-medium text-center text-white hover:text-teal-400 bg-teal-400 hover:bg-white hover:shadow-md hover:shadow-teal-400/75 rounded-md duration-200 cursor-pointer">Lihat
                Detail</a>
              <a href="{{ '/admin/pendanaan/detail/' . $value->id_proyek_pendanaan }}"
                class="w-full py-1 font-roboto font-medium text-center text-white hover:text-yellow-500 bg-yellow-500 hover:bg-white hover:shadow-md hover:shadow-yellow-500/75 rounded-md duration-200 cursor-pointer">Lihat
                Proyek</a>
            </div>
          @endforeach
        @elseif (request()->get('menu') == 2)
          @foreach ($proyek_pendanaan as $key => $value)
            @if ($value->Pembayaran->status_pembayaran == 1)
              <div class="p-4 col-span-3 rounded-lg flex flex-col bg-white gap-2">
                <img src="/images/finance.jpg" class="w-full rounded-md h-[20rem] object-cover object-center" alt="">
                <div class="flex rounded-md w-full bg-neutral-400 text-neutral-800 overflow-hidden font-roboto font-medium">
                  <div
                    class="py-1 flex-1 text-center hover:text-white hover:bg-emerald-400 cursor-pointer duration-200 {{ $value->Pembayaran->status_pembayaran == 1 ? 'text-white bg-emerald-400 cursor-default' : '' }}">
                    Disetujui</div>
                  <div
                    class="py-1 flex-1 text-center hover:text-white hover:bg-red-500 cursor-pointer duration-200 {{ $value->Pembayaran->status_pembayaran == 0 ? 'text-white bg-red-500 cursor-default' : '' }}">
                    Belum Disetujui</div>
                </div>
                <a href="{{ '/admin/detail-pembayaran/' . $value->Pembayaran->id_pembayaran }}"
                  class="w-full py-1 font-roboto font-medium text-center text-white hover:text-teal-400 bg-teal-400 hover:bg-white hover:shadow-md hover:shadow-teal-400/75 rounded-md duration-200 cursor-pointer">Lihat
                  Detail</a>
                <a href="{{ '/admin/pendanaan/detail/' . $value->id_proyek_pendanaan }}"
                  class="w-full py-1 font-roboto font-medium text-center text-white hover:text-yellow-500 bg-yellow-500 hover:bg-white hover:shadow-md hover:shadow-yellow-500/75 rounded-md duration-200 cursor-pointer">Lihat
                  Proyek</a>
              </div>
            @endif
          @endforeach
        @elseif (request()->get('menu') == 3)
          @foreach ($proyek_pendanaan as $key => $value)
            @if ($value->Pembayaran->status_pembayaran == 0)
              <div class="p-4 col-span-3 rounded-lg flex flex-col bg-white gap-2">
                <img src="/images/finance.jpg" class="w-full rounded-md h-[20rem] object-cover object-center" alt="">
                <div class="flex rounded-md w-full bg-neutral-400 text-neutral-800 overflow-hidden font-roboto font-medium">
                  <div
                    class="py-1 flex-1 text-center hover:text-white hover:bg-emerald-400 cursor-pointer duration-200 {{ $value->Pembayaran->status_pembayaran == 1 ? 'text-white bg-emerald-400 cursor-default' : '' }}">
                    Disetujui</div>
                  <div
                    class="py-1 flex-1 text-center hover:text-white hover:bg-red-500 cursor-pointer duration-200 {{ $value->Pembayaran->status_pembayaran == 0 ? 'text-white bg-red-500 cursor-default' : '' }}">
                    Belum Disetujui</div>
                </div>
                <a href="{{ '/admin/detail-pembayaran/' . $value->Pembayaran->id_pembayaran }}"
                  class="w-full py-1 font-roboto font-medium text-center text-white hover:text-teal-400 bg-teal-400 hover:bg-white hover:shadow-md hover:shadow-teal-400/75 rounded-md duration-200 cursor-pointer">Lihat
                  Detail</a>
                <a href="{{ '/admin/pendanaan/detail/' . $value->id_proyek_pendanaan }}"
                  class="w-full py-1 font-roboto font-medium text-center text-white hover:text-yellow-500 bg-yellow-500 hover:bg-white hover:shadow-md hover:shadow-yellow-500/75 rounded-md duration-200 cursor-pointer">Lihat
                  Proyek</a>
              </div>
            @endif
          @endforeach
        @endif
      </div>
    </div>
  </div>
</body>

</html>
