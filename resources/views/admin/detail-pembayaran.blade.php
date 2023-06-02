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

<body class="antialiased bg-neutral-200 min-h-screen w-full flex flex-col overflow-x-hidden relative ">
  <x-navbar />
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="{{ '/admin/detail-pembayaran/' . $pembayaran->id_pembayaran }}"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">close</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif
  <div class="flex flex-col items-center gap-2 mb-8">
    <h1 class="text-yellow-500 font-righteous text-5xl my-4">Detail Pembayaran</h1>
    <div
      class="flex flex-col items-center w-[35rem] gap-2 p-4  text-neutral-500 font-medium font-roboto rounded-lg shadow-md shadow-black/30 bg-white">
      <h2 class="text-2xl font-righteous text-neutral-700 my-2">{{ $deskripsi_usaha->nama_usaha }}</h2>
      <div class="flex flex-col items-center w-full">
        <h3 class="mx-2 text-lg">Foto Bukti Pembayaran</h3>
        <div
          class=" rounded-md w-full h-[25rem] bg-contain bg-no-repeat bg-[url('{{ empty($pembayaran->bukti_pembayaran) ? '/images/nothing.jpg' : $pembayaran->bukti_pembayaran }}')]">
        </div>
      </div>
      <div class="grid grid-cols-12 w-full gap-2 ">
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">Tanggal Pembayaran</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ empty($pembayaran->tanggal_pembayaran) ? 'Belum Dibayarkan' : $pembayaran->tanggal_pembayaran }}
          </div>
        </div>
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">Nama Pendana</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ $pendana->nama }}
          </div>
        </div>
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">Status Pembayaran</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ $pembayaran->status_pembayaran == 0 ? 'Belum Disetujui' : 'Sudah Disetujui' }}
          </div>
        </div>
        <div class="col-span-6 flex flex-col">
          <h3 class="mx-2">Jumlah Dana Pembayaran</h3>
          <div class="p-2 rounded-md bg-neutral-200">
            {{ $pembayaran->proyekPendanaan->jumlah_dana }}
          </div>
        </div>
      </div>
      <a href="{{ $pembayaran->status_pembayaran == 0 ? '/admin/setujui-pembayaran/' . $pembayaran->id_pembayaran : '/admin/tolak-pembayaran/' . $pembayaran->id_pembayaran }}"
        class="w-[20rem] my-2 py-1 text-white text-center duration-200 {{ $pembayaran->status_pembayaran == 0 ? 'bg-emerald-400 hover:text-emerald-400 hover:bg-white rounded-full hover:shadow-md hover:shadow-emerald-400/50' : 'bg-red-600 hover:text-red-600 hover:bg-white rounded-full hover:shadow-md hover:shadow-red-600/50' }}">{{ $pembayaran->status_pembayaran == 0 ? 'Setujui Pembayaran' : 'Tidak Setujui Pembayaran' }}</a>
      <button onclick="javascript:history.back()"
        class="w-[20rem] my-2 py-1 bg-rose-600 text-white hover:text-rose-600 hover:bg-white rounded-full hover:shadow-md hover:shadow-rose-600/50 duration-200">Kembali</button>
    </div>
  </div>

</body>

</html>
