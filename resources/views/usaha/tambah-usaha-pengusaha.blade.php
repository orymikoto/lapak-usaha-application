<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>Vestry</title>
</head>

<body>
  <x-navbar />
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{session()->get('pesan')}}</p>
        <a href="/daftar-usaha/{{request()->route()->id_pemilik_usaha}}" class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">close</a>
      </div>
    </div>
    {{session()->forget('pesan')}}
  @endif
  <div class="flex flex-col w-full items-center">
    <h1 class="my-4 font-righteous text-yellow-500 text-3xl">Tambah Data Usaha</h1>
    <form action="/daftar-usaha/tambah/{{ auth('pengusaha')->user()->id_pemilik_usaha }}" enctype="multipart/form-data"
      class="flex flex-col w-[40rem] items-center rounded-md shadow-[2px_5px_10px_0px_rgba(0,0,0,0.5)] p-4 gap-2" method="post">
      @csrf
      <h2 class="text-neutral-700 text-2xl font-righteous my-2">Detail Usaha</h2>
      <div class="flex flex-col w-[30rem]">
        <p class="text-neutral-500 font-medium font-roboto mx-2">NAMA USAHA</p>
        <input type="text" name="nama_usaha" required
        oninvalid="this.setCustomValidity('Semua data harus diisi')"
          class="outline-none px-2 focus:ring-0 border-2 border-neutral-200 text-neutral-500 focus:text-yellow-500 focus:border-yellow-500 rounded-md py-1 font-medium font-roboto duration-200">
      </div>
      <div class="flex flex-col w-[30rem]">
        <p class="text-neutral-500 font-medium font-roboto mx-2">DESKRIPSI</p>
        <input type="text" name="deskripsi" required
        oninvalid="this.setCustomValidity('Semua data harus diisi')"
          class="px-2 outline-none focus:ring-0 border-2 border-neutral-200 text-neutral-500 focus:text-yellow-500 focus:border-yellow-500 rounded-md py-1 font-medium font-roboto duration-200">
      </div>
      <div class="flex flex-col w-[30rem]">
        <p class="text-neutral-500 font-medium font-roboto mx-2">JENIS USAHA</p>
        <select name="jenis_usaha" required
        oninvalid="this.setCustomValidity('Semua data harus diisi')"
          class="px-2 py-[6px] outline-none focus:ring-0 border-2 border-neutral-200 text-neutral-500 focus:text-yellow-500 focus:border-yellow-500 rounded-md font-medium font-roboto duration-200">
          <option value="1">Pilih jenis usaha</option>
          @foreach ($jenis_usaha as $key => $value)
            <option value="{{ $value->id_jenis_usaha }}">{{ $value->nama_jenis_usaha }}</option>
          @endforeach
        </select>
      </div>
      <div class="flex flex-col w-[30rem]">
        <p class="text-neutral-500 font-medium font-roboto mx-2">TAHUN BERDIRI</p>
        <input type="number" name="tahun_berdiri" required
        oninvalid="this.setCustomValidity('Semua data harus diisi')"
          class="px-2 outline-none focus:ring-0 border-2 border-neutral-200 text-neutral-500 focus:text-yellow-500 focus:border-yellow-500 rounded-md py-1 font-medium font-roboto duration-200">
      </div>
      <div class="flex flex-col w-[30rem]">
        <p class="text-neutral-500 font-medium font-roboto mx-2">PERIODE PRODUKSI</p>
        <input type="number" name="periode_produksi" required
        oninvalid="this.setCustomValidity('Semua data harus diisi')"
          class="px-2 outline-none focus:ring-0 border-2 border-neutral-200 text-neutral-500 focus:text-yellow-500 focus:border-yellow-500 rounded-md py-1 font-medium font-roboto duration-200">
      </div>
      <div class="flex flex-col w-[30rem]">
        <p class="text-neutral-500 font-medium font-roboto mx-2">TARGET DANA</p>
        <input type="number" step="100000" name="target_dana" required
        oninvalid="this.setCustomValidity('Semua data harus diisi')"
          class="px-2 outline-none focus:ring-0 border-2 border-neutral-200 text-neutral-500 focus:text-yellow-500 focus:border-yellow-500 rounded-md py-1 font-medium font-roboto duration-200">
      </div>
      <div class="flex flex-col w-[30rem]">
        <p class="text-neutral-500 font-medium font-roboto mx-2">FOTO USAHA</p>
        <input type="file" id="files" accept="image/*" name="foto_usaha" required
        oninvalid="this.setCustomValidity('Semua data harus diisi')"
          class=" outline-none rounded-md file:cursor-pointer file:py-2 file:px-4 bg-neutral-100 file:rounded-md file:outline-none file:bg-neutral-200 file:text-yellow-500 hover:file:text-white hover:file:bg-yellow-500 file:duration-200 file:ring-0 file:border-none focus:ring-0 text-neutral-500 focus:text-yellow-500 font-medium font-roboto duration-200">
      </div>
      <div class="flex flex-col w-[30rem]">
        <p class="text-neutral-500 font-medium font-roboto mx-2">PROPOSAL</p>
        <input type="file" id="files" accept="application/pdf" name="proposal" required
        oninvalid="this.setCustomValidity('Semua data harus diisi')"
          class=" outline-none rounded-md file:cursor-pointer file:py-2 file:px-4 bg-neutral-100 file:rounded-md file:outline-none file:bg-neutral-200 file:text-yellow-500 hover:file:text-white hover:file:bg-yellow-500 file:duration-200 file:ring-0 file:border-none focus:ring-0 text-neutral-500 focus:text-yellow-500 font-medium font-roboto duration-200">
      </div>
      <button type="submit"
        class="w-[20rem] py-1 text-center text-white hover:text-rose-600 bg-rose-600 hover:bg-white hover:shadow-md hover:shadow-rose-600/50 duration-200 my-2 rounded-full font-roboto font-medium text-lg ">Tambah
        Usaha</button>
    </form>
  </div>

</body>

</html>
