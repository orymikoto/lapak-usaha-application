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
  
  <x-modal-show-picture judul="Foto Deskripsi Usaha" urlFoto="{{$detailPendanaan->deskripsiUsaha->foto_usaha}}" />
  <div class="flex-1 flex flex-col w-full items-center gap-4 mb-8">
    <h1 class="font-righteous text-3xl text-yellow-500 my-2">Detail Pendanaan</h1>
    <div class="bg-white rounded-lg p-4 flex flex-col items-center w-[40rem] shadow-[2px_3px_7px_1px_rgba(0,0,0,0.3)]">
      <h2 class="font-righteous text-xl text-neutral-700 my-4">Deskripsi Usaha</h2>
      <div class="grid grid-cols-12 gap-2 w-full text-neutral-600">
        <div class="flex flex-col font-roboto font-medium w-ful col-span-6">
          <h3 class="mx-2 text-lg font-medium">Nama Usaha</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->deskripsiUsaha->nama_usaha }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium w-ful col-span-6">
          <h3 class="mx-2 text-lg font-medium">Pemilik Usaha</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->pemilikUsaha->nama }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium w-ful col-span-6">
          <h3 class="mx-2 text-lg font-medium">Jenis Usaha</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $jenisUsaha->nama_jenis_usaha }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium w-ful col-span-6">
          <h3 class="mx-2 text-lg font-medium">Target Dana</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->deskripsiUsaha->target_dana }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium w-ful col-span-6">
          <h3 class="mx-2 text-lg font-medium">Tahun Berdiri</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->deskripsiUsaha->tahun_berdiri }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium w-ful col-span-6">
          <h3 class="mx-2 text-lg font-medium">Periode Produksi</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->deskripsiUsaha->periode_produksi }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium w-ful col-span-full">
          <h3 class="mx-2 text-lg font-medium">Deskripsi</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->deskripsiUsaha->deskripsi }}
          </div>
        </div>
      </div>

      {{-- FILE KONTRAK --}}
      <h2 class="text-neutral-700 font-medium font-righteous text-xl text-center mt-4">File Kontrak</h2>
      <div class="flex w-[70%] gap-4">
        <div class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="/icons/pdf.svg" class="w-16 h-16 " alt="">
          <p>Admin</p>
        </div>
        <div class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="/icons/pdf.svg" class="w-16 h-16 " alt="">
          <p>Pendana</p>
        </div>
        <div class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="/icons/pdf.svg" class="w-16 h-16 " alt="">
          <p>Pengusaha</p>
        </div>
      </div>

      {{-- FILE FOTO --}}
      <h2 class="text-neutral-700 font-medium font-righteous text-xl text-center mt-4">File Foto</h2>
      <div class="flex w-[70%] gap-4 ">
        <div class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="/icons/img.svg" class="w-16 h-16 " alt="">
          <p>Deskripsi Usaha</p>
        </div>
        <div class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="/icons/img.svg" class="w-16 h-16 " alt="">
          <p>Bukti Pembayaran</p>
        </div>
        <div class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="/icons/img.svg" class="w-16 h-16 " alt="">
          <p>Bukti Bagi Hasil</p>
        </div>
      </div>

      {{-- ACTIONS --}}
      <h2 class="text-neutral-700 font-medium font-righteous text-xl text-center mt-4">Tambah Data</h2>
      <div class="flex gap-4 w-[70%]">
        <div class="hover:text-yellow-500 py-1 flex flex-col items-center flex-1 hover:bg-neutral-200 duration-200 cursor-pointer ">
         <img src="/icons/upload.svg" class="w-10 h-10 " alt="">
          <p>File Kontrak</p>
        </div>
        <div class="hover:text-yellow-500 py-1 flex flex-col items-center flex-1 hover:bg-neutral-200 duration-200 cursor-pointer ">
         <img src="/icons/upload.svg" class="w-10 h-10 " alt="">
          <p>Bukti Pembayaran</p>
        </div>
        <div class="hover:text-yellow-500 py-1 flex flex-col items-center flex-1 hover:bg-neutral-200 duration-200 cursor-pointer ">
         <img src="/icons/upload.svg" class="w-10 h-10 " alt="">
          <p>Bukti Bagi Hasil</p>
        </div>
      </div>
      <div class="text-white bg-red-600 hover:text-red-600 rounded-md hover:bg-white hover:shadow-md hover:shadow-red-600/70 duration-200 w-[14rem] py-1 font-roboto font-medium text-xl text-center cursor-pointer my-4">Batalkan</div>
    </div>
  </div>
</body>

</html>
