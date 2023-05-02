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
  {{-- <div id="picture" class="absolute hidden z-10 w-full h-full bg-neutral-500/60 flex items-center justify-center">
    <div class="bg-white rounded-lg p-4 w-[40rem] h-[35rem] flex flex-col items-center">
      <img src=" {{ $deskripsi_usaha->id_deskripsi_usaha > 3 ? asset('/storage' . $deskripsi_usaha->foto_usaha) : $deskripsi_usaha->foto_usaha }}"
        class="w-full h-[30rem] rounded-lg object-cover object-center" alt="">
      <button onclick="closePicture()"
        class="w-[10rem] py-1 mx-auto my-2 bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-full hover:shadow-md hover:shadow-red-500/50 duration-200">close</button>
    </div>
  </div> --}}
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
        <a href="/pendanaan/progres-pendanaan/{{ request()->route()->id_proyek_pendanaan }}"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">close</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif
  <div class="flex flex-col items-center gap-2">
    <h1 class="text-yellow-500 font-righteous text-3xl my-4">Edit Progres Pendanaan</h1>
    <form action="{{ '/progres-pendanaan/edit/' . $progres_pendanaan->id_progres_pendanaan }}" method="POST" enctype="multipart/form-data"
      class="flex flex-col items-center w-[35rem] gap-2 p-4  text-neutral-500 font-medium font-roboto rounded-lg shadow-md shadow-black/30 bg-white">
      <a href="{{ $progres_pendanaan->laporan_keuangan }}"
        class="flex flex-col items-center hover:bg-neutral-200 duration-200 rounded-md hover:text-yellow-500 p-2">
        <img src="/icons/pdf.svg" class="w-12 h-12" alt="">
        <p>Laporan Keuangan</p>
      </a>
      <div class="flex flex-col items-center w-full">
        <h3 class="mx-2 text-lg">Keterangan</h3>
        <input name="keterangan"
          class="p-2 rounded-md w-full bg-neutral-200 focus:border-yellow-500 focus:bg-white border-2 duration-200  outline-none "
          value="{{ $progres_pendanaan->keterangan }}">
      </div>
      <div class="flex items-center justify-center w-full">
        <label for="dropzone-file"
          class="flex flex-col items-center justify-center w-full h-48 border-2 text-neutral-400 border-gray-300 border-dashed rounded-lg cursor-pointer bg-neutral-200 hover:bg-white hover:border-yellow-500 hover:text-yellow-500 duration-200">

          <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg aria-hidden="true" class="w-10 h-10 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
            </svg>
            <p class="mb-2 text-sm "><span class="font-semibold">Upload Laporan Keuangan</span> Baru</p>
            <p class="text-xs ">PDF</p>
          </div>
          <input id="dropzone-file" name="laporan_keuangan" type="file" accept="application/pdf" class="hidden" />
        </label>
      </div>
      <button type="submit"
        class="w-[20rem] py-1 my-4 bg-emerald-400 text-white hover:text-emerald-400 hover:bg-white rounded-full hover:shadow-md hover:shadow-emerald-400/50 duration-200">Submit</button>
      <a href="{{ '/pendanaan/progres-pendanaan/' . $progres_pendanaan->id_proyek_pendanaan }}"
        class="w-[20rem] py-1 bg-rose-600 text-white text-center hover:text-rose-600 hover:bg-white rounded-full hover:shadow-md hover:shadow-rose-600/50 duration-200">Back</a>
    </form>
  </div>

</body>

</html>
