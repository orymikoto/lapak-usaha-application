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
        <a href="/pendanaan/pencairan/{{ request()->route()->id_proyek_pendanaan }}"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">close</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif
  <div class="flex flex-col items-center gap-2">
    <h1 class="text-yellow-500 font-righteous text-3xl my-4">Tambah Pencairan</h1>
    <form action="{{ '/pencairan/ajukan/' . request()->route('id_proyek_pendanaan') }}" method="POST" enctype="multipart/form-data"
      class="flex flex-col items-center w-[35rem] gap-2 p-4  text-neutral-500 font-medium font-roboto rounded-lg shadow-md shadow-black/30 bg-white">
      @csrf
      <div class="flex flex-col items-center w-full">
        <h3 class="mx-2 text-lg">Nominal Pencairan</h3>
        <input name="nominal_pencairan" type="number" placeholder="{{ 'max: ' . $pendanaan->jumlah_dana }}" required step="10000" max="{{ $pendanaan->jumlah_dana }}"
          class="p-2 placeholder:text-neutral-400 text-neutral-600 rounded-md w-full bg-neutral-200 focus:border-yellow-500 focus:bg-white border-2 duration-200  outline-none ">
      </div>
      <div class="flex flex-col items-center w-full">
        <h3 class="mx-2 text-lg">Tanggal Pengajuan</h3>
        <input name="tanggal_pencairan_dana" placeholder="nominal_pencairan" required disabled value="{{ date('Y-m-d') }}"
          class="p-2 placeholder:text-neutral-400 text-neutral-600 rounded-md w-full bg-neutral-200 focus:border-yellow-500 focus:bg-white border-2 duration-200  outline-none ">
      </div>
      <button type="submit"
        class="w-[20rem] py-1 my-4 bg-emerald-400 text-white hover:text-emerald-400 hover:bg-white rounded-full hover:shadow-md hover:shadow-emerald-400/50 duration-200">Submit</button>
      <div onclick="javascript:history.back()"
        class="w-[20rem] py-1 text-center cursor-pointer bg-rose-600 text-white hover:text-rose-600 hover:bg-white rounded-full hover:shadow-md hover:shadow-rose-600/50 duration-200">
        Back</div>
    </form>
  </div>

</body>

</html>
