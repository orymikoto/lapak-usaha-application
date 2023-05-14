<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>Document</title>
</head>

<body class="antialiased bg-neutral-200 min-h-screen w-full flex flex-col overflow-x-hidden ">
  <x-navbar />
  <div class="flex-1 flex flex-col w-full items-center gap-4">
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
    </div>
  </div>
</body>

</html>
