<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')

  <title>Vestry</title>

  <script>
    const showKonfirmasi = (id) => {
      document.getElementById("konfirmasi").classList.remove("hidden")
      document.getElementById("link_konfirmasi").href = `/daftar-usaha/hapus/${id}`
    }

    const hideKonfirmasi = () => {
      document.getElementById("konfirmasi").classList.add("hidden")
      document.getElementById("link_konfirmasi").href = "/"
    }
  </script>
</head>

<body class="antialiased bg-neutral-100 min-h-screen w-full flex flex-col overflow-x-hidden relative ">
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="/daftar-usaha/{{ request()->route()->id_pemilik_usaha }}"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">close</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif
  <div id="konfirmasi" class="hidden w-full h-full z-10 flex flex-1 items-center justify-center absolute bg-neutral-500/60">
    <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
      <h2 class="text-lg">Pesan!</h2>
      <p class="text-sm font-light text-neutral-400 w-[10rem]">Hapus data deskripsi usaha yang dipilih?</p>
      <div class="flex gap-x-2">
        <button
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50"
          onclick="hideKonfirmasi()">Tidak</button>
        <a id="link_konfirmasi" href="/daftar-usaha/hapus/"
          class="py-1 w-[7rem] text-center bg-emerald-400 text-white hover:text-emerald-400 hover:bg-white rounded-md hover:shadow-md hover:shadow-emerald-400/50">Ya</a>
      </div>
    </div>
  </div>

  <x-navbar />

  {{-- DAFTAR USAHA --}}
  <div class="flex-1 flex flex-col mx-8 relative gap-4">
    <h1 class="text-yellow-500 font-righteous text-3xl text-center my-4">Daftar Usaha {{ auth('pengusaha')->user()->username }}</h1>
    @foreach ($daftar_usaha_user as $key => $value)
      {{-- {{ asset('storage/app/public' . $value->foto_usaha) }} --}}
      <div class="flex flex-col md:flex-row md:justify-start items-center rounded-md p-4 gap-4 shadow-[4px_5px_10px_0px_rgba(0,0,0,0.5)] ">
        {{-- FOTO USAHA --}}
        {{-- {{ $value->foto_usaha }} --}}
        <img class="xl:block md:hidden block w-[20rem] h-[16rem]  rounded-md shadow-md object-cover object-center"
          src="{{ $value->id_deskripsi_usaha > 3 ? asset('/storage' . $value->foto_usaha) : $value->foto_usaha }}" alt="" srcset="">

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
          <div class="flex flex-col items-center self-center my-2 justify-center gap-2 w-[12rem]">
            <div class="flex w-[10rem] rounded-full bg-neutral-200 overflow-hidden">
              <a href="/daftar-usaha/edit/{{ $value->id_deskripsi_usaha }}"
                class="flex-1 hover:text-white duration-200 font-medium text-center py-1 cursor-pointer text-yellow-500 hover:bg-yellow-500 font-roboto">
                Edit</a>
              <div onclick="showKonfirmasi({{ $value->id_deskripsi_usaha }})"
                class="flex-1 hover:text-white duration-200 font-medium text-center py-1 cursor-pointer text-red-500 hover:bg-red-500 font-roboto">
                Delete</div>
            </div>
          </div>
        </div>

        {{-- ACTION --}}


      </div>
    @endforeach
    <a href="/daftar-usaha/tambah/{{ auth('pengusaha')->user()->user_id }}"
      class="bg-emerald-400 duration-200 text-white right-[50%] hover:text-emerald-400 hover:bg-white w-[7rem] hover:shadow-md hover:shadow-emerald-400/50 py-1 rounded-full overflow-hidden my-4  mx-auto text-center font-medium font-roboto">Tambah</a>
  </div>


</body>

</html>
