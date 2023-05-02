<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')
  <script>
    const closePicture = () => {
      let picture = document.getElementById("picture")
      picture.classList.add('hidden')
    }
    const openPicture = () => {
      let picture = document.getElementById("picture")
      picture.classList.remove('hidden')
    }
  </script>

  <title>Vestry</title>
</head>

<body class="antialiased bg-neutral-200 min-h-screen w-full flex flex-col overflow-x-hidden ">
  <div id="picture" class="absolute hidden z-10 w-full h-full bg-neutral-500/60 flex items-center justify-center">
    <div class="bg-white rounded-lg p-4 w-[40rem] h-[35rem] flex flex-col items-center">
      <img src=" {{ $deskripsi_usaha->id_deskripsi_usaha > 3 ? asset('/storage' . $deskripsi_usaha->foto_usaha) : $deskripsi_usaha->foto_usaha }}"
        class="w-full h-[30rem] rounded-lg object-cover object-center" alt="">
      <button onclick="closePicture()"
        class="w-[10rem] py-1 mx-auto my-2 bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-full hover:shadow-md hover:shadow-red-500/50 duration-200">close</button>
    </div>
  </div>
  {{-- <div id="pdf" class="absolute z-10 w-full h-full bg-neutral-500/60 flex items-center justify-center">
    <div class="bg-white rounded-lg p-4 w-[40rem] h-[35rem] flex flex-col items-center" width="800" height="400">
      <iframe src="http://docs.google.com/gview?url=http://path.com/to/your/pdf.pdf&embedded=true" style="width:600px; height:500px;"
        frameborder="0"></iframe>
      <button onclick=""
        class="w-[10rem] py-1 mx-auto my-2 bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-full hover:shadow-md hover:shadow-red-500/50 duration-200">close</button>
    </div>
  </div> --}}
  <x-navbar />
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="/daftar-usaha/view/{{ $deskripsi_usaha->id_deskripsi_usaha }}"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">close</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif
  <div class="flex flex-col items-center gap-2">
    <h1 class="text-yellow-500 font-righteous text-5xl my-4">Detail Usaha</h1>
    <div
      class="flex flex-col items-center w-[35rem] gap-2 p-4  text-neutral-500 font-medium font-roboto rounded-lg shadow-md shadow-black/30 bg-white">
      <h2 class="text-2xl font-righteous text-neutral-700 my-2">{{ $deskripsi_usaha->nama_usaha }}</h2>
      <div class="flex flex-col items-center w-full">
        <h3 class="mx-2 text-lg">Deskripsi</h3>
        <div class="p-2 rounded-md w-full bg-neutral-200">
          {{ $deskripsi_usaha->deskripsi }}
        </div>
      </div>
      <div class="grid grid-cols-12 w-full gap-2 ">
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">Pemilik Usaha</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ $deskripsi_usaha->nama }}
          </div>
        </div>
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">Pekerjaan Sampingan</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ $deskripsi_usaha->pekerjaan_sampingan }}
          </div>
        </div>
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">No Hp Pemilik Usaha</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ $deskripsi_usaha->no_hp }}
          </div>
        </div>
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">Tahun Berdiri</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ $deskripsi_usaha->tahun_berdiri }}
          </div>
        </div>
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">Periode Produksi</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ $deskripsi_usaha->periode_produksi }}
          </div>
        </div>
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">Target Dana</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ $deskripsi_usaha->target_dana }}
          </div>
        </div>
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">Jenis Usaha</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ $deskripsi_usaha->nama_jenis_usaha }}
          </div>
        </div>
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">Status Pengajuan</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ $deskripsi_usaha->status_pengajuan }}
          </div>
        </div>
      </div>
      <div class="flex gap-x-4 my-2">
        <div class="w-14 h-14 flex items-center justify-center">
          <img onclick="openPicture()" src="/icons/img.svg" class="w-12 h-12 hover:w-14 hover:h-14 cursor-pointer duration-200" alt=""
            srcset="">
        </div>
        <div class="w-14 h-14 flex items-center justify-center">
          <a href="{{ $deskripsi_usaha->id_deskripsi_usaha > 3 ? asset('/storage' . $deskripsi_usaha->proposal) : $deskripsi_usaha->proposal }}"
            target="_blank">
            <img src="/icons/pdf.svg" class="w-12 h-12 hover:w-14 hover:h-14 cursor-pointer duration-200" alt="" srcset="">
          </a>
        </div>
      </div>
      <button onclick="javascript:history.back()"
        class="w-[20rem] py-1 bg-rose-600 text-white hover:text-rose-600 hover:bg-white rounded-full hover:shadow-md hover:shadow-rose-600/50 duration-200">Back</button>
    </div>
  </div>

</body>

</html>
