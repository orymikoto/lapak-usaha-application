<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>Vestry</title>
</head>

<body class="antialiased bg-neutral-100 min-h-screen w-full flex flex-col overflow-x-hidden overflow-y-scroll">
  <x-navbar />
  <div class="flex flex-col items-center pb-8">
    <h1 class="text-3xl font-righteous text-yellow-500 my-4 text-center">Tambah Pendanaan</h1>
    <div class="flex lg:flex-row flex-col gap-x-2">
      {{-- DESKRIPSI USAHA --}}
      <div class="w-[30rem] h-[35rem] bg-neutral-400/25 flex flex-col-reverse overflow-hidden rounded-lg shadow-md">
        <div class="w-full h-[33rem] bg-gradient-to-b from-amber-400/75 to-rose-600/75 rounded-t-lg flex flex-col p-4">
          <h2 class="text-white font-righteous text-xl text-center my-2">Deskripsi Usaha</h2>
          <div class="grid grid-cols-12 gap-2 my-8">
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Nama Usaha</p>
              <div class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate">{{$deskripsi_usaha->nama_usaha}}</div>
            </div>
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Nama Pemilik Usaha</p>
              <div class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate">{{$deskripsi_usaha->pemilikUsaha->nama}}</div>
            </div>
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Tahun Berdiri</p>
              <div class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate">{{$deskripsi_usaha->tahun_berdiri}}</div>
            </div>
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Periode Produksi</p>
              <div class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate">{{$deskripsi_usaha->periode_produksi}}</div>
            </div>
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Jenis Usaha</p>
              <div class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate">{{$deskripsi_usaha->jenisUsaha->nama_jenis_usaha}}</div>
            </div>
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Target Dana</p>
              <div class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate">{{$deskripsi_usaha->target_dana}}</div>
            </div>
            <div class="col-start-2 col-end-12 my-4 rounded-full bg-neutral-200 overflow-hidden flex">
              <div class="flex-1 text-center text-neutral-600 py-1 font-medium font-roboto {{ $deskripsi_usaha->id_status_pengajuan == 2 ? 'bg-amber-400 text-white' : '' }}">Terkonfirmasi</div>
              <div class="flex-1 text-center text-neutral-600 py-1 font-medium font-roboto {{ $deskripsi_usaha->id_status_pengajuan == 1 ? 'bg-amber-400 text-white' : '' }}">Tidak Terkonfirmasi</div>
            </div>
          </div>
          <div class="my-2 flex items-center justify-center gap-x-4">
            <div class="flex flex-col items-center text-center">
              <img class="h-12 rounded-md object-cover" src="/icons/img.svg" alt="">
              <p class="text-white font-roboto font-medium">Foto Usaha</p>
            </div>
            <div class="flex flex-col items-center text-center">
              <img class="h-12 rounded-md object-cover" src="/icons/pdf.svg" alt="">
              <p class="text-white font-roboto font-medium">File Proposal</p>
            </div>
          </div>
        </div>
      </div>


      <img src="/icons/right-circle.svg" class="w-12 h-12 self-center lg:block hidden" alt="">
      <img src="/icons/next-down.svg" class="w-12 h-12 self-center lg:hidden block" alt="">

      {{-- FORMULIR PENDANAAN --}}
      <div class="w-[30rem] h-[35rem] bg-neutral-400/25 flex flex-col-reverse overflow-hidden rounded-lg shadow-md">
        <div class="w-full h-[33rem] bg-gradient-to-b from-amber-400/75 to-rose-600/75 rounded-t-lg flex flex-col p-4">
          <h2 class="text-white font-righteous text-xl text-center my-2">Tambah Pendanaan</h2>
          <form action="/pendanaan/tambah/{{$deskripsi_usaha->id_deskripsi_usaha}}" method="POST" class="grid grid-cols-12 gap-2 my-8">
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Jumlah Dana</p>
              <input max="{{$deskripsi_usaha->target_dana}}" type="number" step="100000" class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate focus:ring-0 outline-none hover:bg-yellow-200/50 duration-200" />
            </div>
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Nama Usaha</p>
              <div class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate">{{$deskripsi_usaha->nama_usaha}}</div>
            </div>
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Nama Pemilik Usaha</p>
              <div class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate">{{$deskripsi_usaha->pemilikUsaha->nama}}</div>
            </div>
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Nominal Bagi Hasil</p>
              <div class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate">Belum Ditentukan</div>
            </div>
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Periode Produksi</p>
              <div class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate">{{$deskripsi_usaha->periode_produksi}}</div>
            </div>
            <div class="flex flex-col text-white font-medium font-roboto col-span-6">
              <p class="mx-2">Jenis Usaha</p>
              <div class="px-2 rounded-md py-1 bg-yellow-100/25 text-white truncate">{{$deskripsi_usaha->jenisUsaha->nama_jenis_usaha}}</div>
            </div>
            <div class="my-8 flex items-center justify-center gap-x-4 col-span-12">
              <div class="flex flex-col items-center text-center">
                <img class="h-12 rounded-md object-cover" src="/icons/pdf-disabled.svg" alt="">
                <p class="text-white font-roboto font-medium">File Kontrak Admin</p>
              </div>
              <div class="flex flex-col items-center text-center">
                <img class="h-12 rounded-md object-cover" src="/icons/pdf-disabled.svg" alt="">
                <p class="text-white font-roboto font-medium">File Kontrak Pendana</p>
              </div>
              <div class="flex flex-col items-center text-center">
                <img class="h-12 rounded-md object-cover" src="/icons/pdf-disabled.svg" alt="">
                <p class="text-white font-roboto font-medium">File Kontrak Pengusaha</p>
              </div>
            </div>
            <button type="submit" class="py-1 rounded-full col-start-3 col-end-10 bg-teal-400 text-white font-roboto font-medium text-lg hover:text-teal-400 hover:bg-white hover:shadow-md hover:shadow-teal-400 duration-200 cursor-pointer">
              Submit
            </button>
          </form>
        </div>
      </div>

      <div></div>
    </div>
  </div>
</body>

</html>
