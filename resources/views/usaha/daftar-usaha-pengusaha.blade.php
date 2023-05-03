<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')
  
  <title>Daftar Usaha</title>
</head>
<body class="antialiased bg-neutral-100 min-h-screen w-full flex flex-col overflow-y-scroll">
  <x-navbar />

  <div class="flex w-full flex-1 my-4 gap-x-4">

    {{-- SIDEBAR --}}
    <div class="flex flex-col w-[17rem] bg-white rounded-r-lg text-left text-lg text-yellow-500 font-medium overflow-hidden z-10 shadow-lg shadow-black/50 ">
      <div class="font-semibold text-white bg-yellow-500 py-2 font-righteous px-4 cursor-default select-none">
        <p>Daftar Menu</p>
      </div>
      <div class="flex flex-col flex-1 justify-center font-medium font-roboto">
        <a class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Daftar Usaha Pengguna</p>
        </a>
        <a class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Daftar Usaha</p>
        </a>
        <a class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Pengajuan Pendanaan</p>
        </a>
        <a class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Proyek Berlangsung</p>
        </a>
      </div>
      <a href="/" class="py-2 px-4 hover:bg-red-500 bg-red-200 hover:text-white duration-200 font-semibold text-lg cursor-pointer text-red-500 ">
        Back to home
      </a>
    </div>

    {{-- DAFTAR USAHA --}}
    <div class="flex-1 flex flex-col px-2 pr-6 relative">
      <h1 class="text-yellow-500 font-righteous text-3xl text-center my-4">Daftar Usaha {{auth('pengusaha')->user()->username}}</h1>
      @foreach ( $daftar_usaha_user as $key => $value )
        <div class="flex flex-col">
          <div class="flex rounded-md p-4 gap-4 shadow-[4px_5px_10px_0px_rgba(0,0,0,0.5)] ">
            {{-- FOTO USAHA --}}
            <div class="w-[16rem] min-h-[14rem] bg-[url('{{$value->foto_usaha}}')] rounded-md shadow-md bg-center bg-cover"></div>

            {{-- DETAIL USAHA --}}
            <div class="flex flex-col flex-1 gap-2">
              <h2 class="font-roboto font-medium text-xl text-yellow-500">{{$value->nama_usaha}}</h2>
              <div class="flex text-neutral-500 font-medium font-roboto">
                <p>Tahun Berdiri</p>
                <p>: {{$value->tahun_berdiri}}</p>
              </div>
              <div class="flex text-neutral-500 font-medium font-roboto">
                <p>Jenis Usaha</p>
                <p>: {{$value->nama_jenis_usaha}}</p>
              </div>
              <div class="flex rounded-full w-[21rem] overflow-hidden bg-neutral-200 font-medium font-roboto  text-neutral-400">
                <div class="py-1 text-center cursor-default select-none flex-1 {{ $value->id_status_pengajuan == 2 ? 'text-white bg-emerald-400' : ''}}">Terkonfirmasi</div>
                <div class="py-1 text-center cursor-default select-none  flex-1 {{ $value->id_status_pengajuan == 1 ? 'text-white bg-red-500' : ''}}">Tidak Terkonfirmasi</div>
              </div>
              <div class=" flex flex-col rounded-md text-justify text-neutral-700 ">
                <p class="">Deskripsi</p>
                <p class="p-2 bg-neutral-200 rounded-md text-neutral-500">
                  {{$value->deskripsi}}
                </p>
              </div>
            </div>

            {{-- ACTION --}}
            <div class="flex flex-col items-center justify-center gap-4 w-[15rem]">
              <img src="/icons/pdf.svg" alt="" class="w-12 h-12 cursor-pointer">
              <div class="flex w-[15rem] rounded-full bg-neutral-200 overflow-hidden">
                <div class="flex-1 hover:text-white duration-200 font-medium text-center py-1 cursor-pointer text-blue-500 hover:bg-blue-500 font-roboto">View</div>
                <div class="flex-1 hover:text-white duration-200 font-medium text-center py-1 cursor-pointer text-yellow-500 hover:bg-yellow-500 font-roboto">Edit</div>
                <div class="flex-1 hover:text-white duration-200 font-medium text-center py-1 cursor-pointer text-red-500 hover:bg-red-500 font-roboto">Delete</div>
              </div>
            </div>

          </div>
        </div>
      @endforeach

      <a href="" class="bg-emerald-400 duration-200 text-white right-[50%] hover:text-emerald-400 hover:bg-white w-[7rem] hover:shadow-md hover:shadow-emerald-400/50 py-1 rounded-full overflow-hidden absolute bottom-0 mx-auto text-center font-medium font-roboto">Tambah</a>
    </div>
  </div>
  
</body>
</html>