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
    <div class="my-4 flex-col flex md:w-[90vw] gap-4">
      @if ((request()->get('menu') == 0 || request()->get('menu') == null) && count($daftarPendanaan) > 0  )
          @foreach ( $daftarPendanaan as $key => $value )
              <div class="p-4 flex bg-white rounded-lg shadow-md gap-2">
                <img class="w-[16rem] h-[12rem] object-cover object-center rounded-md" src="{{$value->deskripsiUsaha->id_deskripsi_usaha > 3 ? asset('/storage' . $value->deskripsiUsaha->foto_usaha) : $value->deskripsiUsaha->foto_usaha}}" alt="" srcset="">
                <div class="flex flex-col gap-2 justify-start">
                  <h2 class="text-yellow-500 font-righteous text-2xl">
                    {{$value->deskripsiUsaha->nama_usaha}}
                  </h2>
                  <div class="flex w-[21rem]">
                    <p class="font-medium font-roboto text-neutral-700 flex-1">
                      Pemilik Usaha
                    </p>
                    <p class="font-medium font-roboto text-neutral-700 flex-1 truncate">
                      {{": ". $value->pemilikUsaha->nama}}
                    </p>
                  </div>
                  <div class="flex w-[21rem]">
                    <p class="font-medium font-roboto text-neutral-700 flex-1">
                      Pendana
                    </p>
                    <p class="font-medium font-roboto text-neutral-700 flex-1 truncate">
                      {{": ". $value->Pendana->nama}}
                    </p>
                  </div>
                  <div class="flex w-[21rem]">
                    <p class="font-medium font-roboto text-neutral-700 flex-1">
                      Jumlah Dana
                    </p>
                    <p class="font-medium font-roboto text-neutral-700 flex-1 truncate">
                      {{": ". $value->jumlah_dana}}
                    </p>
                  </div>
                  <div class="flex w-[21rem]">
                    <p class="font-medium font-roboto text-neutral-700 flex-1">
                      Nominal Bagi Hasil
                    </p>
                    <p class="font-medium font-roboto text-neutral-700 flex-1 truncate">
                      {{": ". $value->nominla_bagi_hasil}}
                    </p>
                  </div>
                </div>
                <div class="flex flex-col items-center justify-center cursor-pointer text-neutral-700 hover:text-yellow-500 duration-200 w-[9rem]">
                  <img src="/icons/pdf.svg" class="w-16 h-16">
                  <p class="font-medium font-roboto w-[7rem] text-center">File Kontrak Admin</p>
                </div>
                <div class="flex flex-col items-center justify-center cursor-pointer text-neutral-700 hover:text-yellow-500 duration-200 w-[9rem]">
                  <img src="/icons/pdf.svg" class="w-16 h-16">
                  <p class="font-medium font-roboto w-[7rem] text-center">File Kontrak Pendana</p>
                </div>
                <div class="flex flex-col items-center justify-center cursor-pointer text-neutral-700 hover:text-yellow-500 duration-200 w-[9rem]">
                  <img src="/icons/pdf.svg" class="w-16 h-16">
                  <p class="font-medium font-roboto w-[7rem] text-center">File Kontrak Pengusaha</p>
                </div>
              </div>
          @endforeach
      @endif
    </div>
  </div>
  
</body>
</html>