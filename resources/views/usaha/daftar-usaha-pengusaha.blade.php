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
        <a href="/daftar-usaha/{{ auth('pengusaha')->user()->id_pemilik_usaha }}"
          class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Daftar Usaha Pengguna</p>
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
      <h1 class="text-yellow-500 font-righteous text-3xl text-center my-4">Daftar Usaha {{ auth('pengusaha')->user()->username }}</h1>
      @foreach ($daftar_usaha_user as $key => $value)
        {{-- {{ asset('storage/app/public' . $value->foto_usaha) }} --}}
        <div class="flex flex-col md:flex-row md:justify-start items-center rounded-md p-4 gap-4 shadow-[4px_5px_10px_0px_rgba(0,0,0,0.5)] ">
          {{-- FOTO USAHA --}}
          {{-- {{ $value->foto_usaha }} --}}
          <img class="xl:block md:hidden block w-[16rem] min-h-[14rem] h-full rounded-md shadow-md object-cover object-center"
            src="{{ asset('upload/foto_usaha/foto_usaha_6452ad34016c5.png') }}" alt="" srcset="">

          {{-- DETAIL USAHA --}}
          <div class="flex flex-col flex-1 gap-2 md:items-start items-center">
            <h2 class="font-roboto font-medium text-xl text-yellow-500">{{ $value->nama_usaha }}</h2>
            <div class="flex text-neutral-500 font-medium font-roboto">
              <p>Tahun Berdiri</p>
              <p>: {{ $value->tahun_berdiri }}</p>
            </div>
            <div class="flex text-neutral-500 font-medium font-roboto">
              <p>Jenis Usaha</p>
              <p>: {{ $value->nama_jenis_usaha }}</p>
            </div>
            <div
              class="flex lg:gap-0 md:gap-2 gap-0 lg:rounded-full md:rounded-none rounded-full lg:flex-row md:flex-col flex-row lg:w-[21rem] md:w-[10rem] w-[21rem] overflow-hidden lg:bg-neutral-200 md:bg-transparent bg-neutral-200 font-medium font-roboto  text-neutral-400">
              <div
                class="py-1 text-center cursor-default select-none flex-1 lg:rounded-none md:rounded-full rounded-none {{ $value->id_status_pengajuan == 2 ? 'text-white bg-emerald-400' : 'lg:bg-transparent md:bg-neutral-200 bg-transparent' }}">
                Terkonfirmasi</div>
              <div
                class="py-1 text-center cursor-default select-none  flex-1 lg:rounded-none md:rounded-full rounded-none {{ $value->id_status_pengajuan == 1 ? 'text-white bg-red-500' : 'lg:bg-transparent md:bg-neutral-200 bg-transparent' }}">
                Tidak Terkonfirmasi</div>
            </div>
            <div class=" flex flex-col md:items-start items-center rounded-md text-justify text-neutral-700 w-full ">
              <p class="">Deskripsi</p>
              <p class="p-2 bg-neutral-200 rounded-md text-neutral-500 w-full">
                {{ $value->deskripsi }}
              </p>
            </div>
          </div>

          {{-- ACTION --}}
          <div class="flex flex-col items-center justify-center gap-2 w-[12rem]">
            <div class="w-14 h-14 flex items-center justify-center">
              <img src="/icons/pdf.svg" alt="" class="w-12 h-12 cursor-pointer hover:w-14 hover:h-14 duration-300">
            </div>
            <div class="flex w-[10rem] rounded-full bg-neutral-200 overflow-hidden">
              <a href="/daftar-usaha/edit/{{ $value->id_deskripsi_usaha }}"
                class="flex-1 hover:text-white duration-200 font-medium text-center py-1 cursor-pointer text-yellow-500 hover:bg-yellow-500 font-roboto">
                Edit</a>
              <div onclick="console.log('hello')"
                class="flex-1 hover:text-white duration-200 font-medium text-center py-1 cursor-pointer text-red-500 hover:bg-red-500 font-roboto">
                Delete</div>
            </div>
          </div>

        </div>
      @endforeach
      <a href="/daftar-usaha/tambah/{{ auth('pengusaha')->user()->user_id }}"
        class="bg-emerald-400 duration-200 text-white right-[50%] hover:text-emerald-400 hover:bg-white w-[7rem] hover:shadow-md hover:shadow-emerald-400/50 py-1 rounded-full overflow-hidden my-4  mx-auto text-center font-medium font-roboto">Tambah</a>
    </div>
  </div>


</body>

</html>
