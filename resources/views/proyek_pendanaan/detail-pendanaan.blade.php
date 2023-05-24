<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>Vestry</title>

  <script>
    // FUNGSI YANG ADA DI SINI UNTUK MENAMPILKAN DAN MENYEMBUNYIKAN SEGALA HIDEN MODAL/POP UP MESSAGE YANG ADA

    // POPUP MENAMPILKAN GAMBAR
    function showPictureModal(urlFoto, Judul) {
      document.getElementById("modal-show-picture").classList.remove('hidden')
      document.getElementById("modal-show-picture-judul").innerText = Judul
      document.getElementById("modal-show-picture-picture").src = urlFoto
    }

    function hidePictureModal() {
      document.getElementById("modal-show-picture").classList.add('hidden')
      document.getElementById("modal-show-picture-judul").innerText = ""
      document.getElementById("modal-show-picture-picture").src = ""
    }

    // POPUP MENAMPILKAN UPLOAD FILE
    function showUploadModal(actionUrl, judul, file_name, inputType) {
      document.getElementById("modal-upload-file").classList.remove('hidden')
      document.getElementById("modal-upload-file-judul").innerText = judul
      document.getElementById("modal-upload-file-form").action = actionUrl
      document.getElementById("modal-upload-file-input").name = file_name
      document.getElementById("modal-upload-file-input").accept = inputType
    }

    function hideUploadModal() {
      document.getElementById("modal-upload-file").classList.add('hidden')
      document.getElementById("modal-upload-file-judul").innerText = ""
      document.getElementById("modal-upload-file-form").action = ""
      document.getElementById("modal-upload-file-input").name = ""
    }

    // POPUP MENAMPILKAN FILE KONTRAK
    function showFileKontrak(urlFile, judul) {
      if (!urlFile) {
        return showNoFileKontrak(judul)
      }
      document.getElementById("modal-show-file-pdf-judul").innerText = judul
      document.getElementById("modal-show-file-pdf-file-kontrak").href = urlFile
      document.getElementById("modal-show-file-pdf").classList.remove('hidden')

    }

    function hideFileKontrak() {
      document.getElementById("modal-show-file-pdf-judul").innerText = ""
      document.getElementById("modal-show-file-pdf-file-kontrak").href = ""
      document.getElementById("modal-show-file-pdf").classList.add('hidden')
    }

    // POPUP MENAMPILKAN PESAN FILE KONTRAK BELUM ADA
    function showNoFileKontrak(judul) {
      document.getElementById("modal-show-no-file-pdf-judul").innerText = judul
      document.getElementById("modal-show-no-file-pdf").classList.remove('hidden')
    }

    function hideNoFileKontrak() {
      document.getElementById("modal-show-no-file-pdf").classList.add('hidden')
    }
  </script>
</head>

<body class="antialiased bg-neutral-200 min-h-screen w-full flex flex-col overflow-x-hidden relative ">
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

  {{-- HIDDEN MODAL --}}
  <x-modal-show-picture />
  <x-modal-upload-file />
  <x-modal-show-file-pdf />
  <x-modal-show-no-file-pdf />


  <div class="flex-1 flex flex-col w-full items-center gap-4 mb-8">
    <h1 class="font-righteous text-3xl text-yellow-500 my-2">Detail Pendanaan</h1>
    <div class="bg-white rounded-lg p-4 flex flex-col items-center w-[40rem] shadow-[2px_3px_7px_1px_rgba(0,0,0,0.3)]">
      {{-- DESKRIPSI USAHA --}}
      <h2 class="font-righteous text-xl text-neutral-700 my-4">Deskripsi Usaha</h2>
      <div class="grid grid-cols-12 gap-2 w-full text-neutral-600">
        <div class="flex flex-col font-roboto font-medium col-span-6">
          <h3 class="mx-2 text-lg font-medium">Nama Usaha</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->deskripsiUsaha->nama_usaha }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium col-span-6">
          <h3 class="mx-2 text-lg font-medium">Pemilik Usaha</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->pemilikUsaha->nama }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium col-span-6">
          <h3 class="mx-2 text-lg font-medium">No Hp Pemilik Usaha</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->pemilikUsaha->no_hp }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium col-span-6">
          <h3 class="mx-2 text-lg font-medium">Pekerjaan Sampingan</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->pemilikUsaha->pekerjaan_sampingan }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium col-span-6">
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

      {{-- PROYEK PENDANAAN --}}
      <h2 class="font-righteous text-xl text-neutral-700 my-4">Proyek Pendanaan</h2>
      <div class="grid grid-cols-12 gap-2 w-full text-neutral-600">
        <div class="flex flex-col font-roboto font-medium col-span-6">
          <div class="flex flex-col font-roboto font-medium ">
            <h3 class="mx-2 text-lg font-mediu col-span-6">Nama Pendana</h3>
            <div class="p-2 rounded-md w-full bg-neutral-200">
              {{ $detailPendanaan->Pendana->nama }}
            </div>
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium col-span-6">
          <h3 class="mx-2 text-lg font-medium">No Hp Pendana</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->Pendana->no_hp }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium col-span-6">
          <h3 class="mx-2 text-lg font-medium ">Jumlah Dana Proyek</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->jumlah_dana }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium col-span-6">
          <h3 class="mx-2 text-lg font-medium">Jumlah Bagi Hasil</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->nominal_bagi_hasil }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium col-span-6">
          <h3 class="mx-2 text-lg font-medium">Status Pembayaran</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->pembayaran->status_pembayaran == 1 ? 'Belum Dibayarkan' : 'Lunas' }}
          </div>
        </div>
        <div class="flex flex-col font-roboto font-medium col-span-6">
          <h3 class="mx-2 text-lg font-medium">Status Proyek</h3>
          <div class="p-2 rounded-md w-full bg-neutral-200">
            {{ $detailPendanaan->statusPendanaan->nama_status }}
          </div>
        </div>
      </div>

      {{-- FILE KONTRAK --}}
      <h2 class="text-neutral-700 font-medium font-righteous text-xl text-center mt-4">File Kontrak</h2>
      <div class="flex w-[70%] gap-4">
        <div onclick="showFileKontrak('{{ $detailPendanaan->file_kontrak_admin }}', 'File Kontrak Admin' )"
          class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="/icons/pdf.svg" class="w-16 h-16 " alt="">
          <p>Admin</p>
        </div>
        <div onclick="showFileKontrak('{{ $detailPendanaan->file_kontrak_pendana }}', 'File Kontrak Pendana' )"
          class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="/icons/pdf.svg" class="w-16 h-16 " alt="">
          <p>Pendana</p>
        </div>
        <div onclick="showFileKontrak('{{ $detailPendanaan->file_kontrak_pengusaha }}', 'File Kontrak Pengusaha' )"
          class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="/icons/pdf.svg" class="w-16 h-16 " alt="">
          <p>Pengusaha</p>
        </div>
      </div>

      {{-- FILE FOTO --}}
      <h2 class="text-neutral-700 font-medium font-righteous text-xl text-center mt-4">File Foto</h2>
      <div class="flex w-[70%] gap-4 ">
        <button {{ empty($detailPendanaan->deskripsiUsaha->foto_usaha) ? 'disabled' : '' }}
          onclick="showPictureModal('{{ $detailPendanaan->deskripsiUsaha->foto_usaha }}', 'Deskripsi Usaha')"
          class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="{{ empty($detailPendanaan->deskripsiUsaha->foto_usaha) ? '/icons/img-disabled.svg' : '/icons/img.svg' }}" class="w-16 h-16 "
            alt="">
          <p>Deskripsi Usaha</p>
        </button>
        <button {{ $detailPendanaan->Pembayaran->status_pembayaran == 0 ? 'disabled' : '' }}
          onclick="showPictureModal('{{ $detailPendanaan->Pembayaran->bukti_pembayaran }}', 'Bukti Pembayaran')"
          class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="{{ $detailPendanaan->Pembayaran->status_pembayaran == 0 ? '/icons/img-disabled.svg' : '/icons/img.svg' }}" class="w-16 h-16 "
            alt="">
          <p>Bukti Pembayaran</p>
        </button>
        <button onclick="showPictureModal('{{ $detailPendanaan->bukti_bagi_hasil }}', 'Bukti Bagi Hasil')"
          {{ empty($detailPendanaan->bukti_bagi_hasil) ? 'disabled' : '' }}
          class="flex flex-col cursor-pointer items-center text-neutral-600 font-medium font-roboto hover:text-yellow-500 duration-200 flex-1 hover:bg-neutral-200">
          <img src="{{ empty($detailPendanaan->bukti_bagi_hasil) ? '/icons/img-disabled.svg' : '/icons/img.svg' }}" class="w-16 h-16 "
            alt="">
          <p>Bukti Bagi Hasil</p>
        </button>
      </div>

      {{-- ACTIONS --}}
      <h2 class="text-neutral-700 font-medium font-righteous text-xl text-center mt-4">Tambah Data</h2>
      <div class="flex gap-4 w-[70%]">
        <div
          onclick="showUploadModal( 
          '{{ auth('admin')->check() ? '/pendanaan/tambah-file-kontrak/admin/' . $detailPendanaan->id_proyek_pendanaan : '' }}{{ auth('pendana')->check() ? '/pendanaan/tambah-file-kontrak/pendana/' . $detailPendanaan->id_proyek_pendanaan : '' }}{{ auth('pengusaha')->check() ? '/pendanaan/tambah-file-kontrak/pengusaha/' . $detailPendanaan->id_proyek_pendanaan : '' }}' , 'Upload File Kontrak', 'file_kontrak', 'application/pdf'  )"
          class="hover:text-yellow-500 py-1 flex flex-col items-center flex-1 hover:bg-neutral-200 duration-200 cursor-pointer ">
          <img src="/icons/upload.svg" class="w-10 h-10 " alt="">
          <p>File Kontrak</p>
        </div>
        <div
          onclick="showUploadModal('{{ '/pendanaan/tambah-bukti-pembayaran/' . $detailPendanaan->id_proyek_pendanaan }}', 'Upload Bukti Pembayaran', 'file_bukti_pembayaran', '{{ 'image/' . '*' }}' )"
          class="hover:text-yellow-500 py-1 flex flex-col items-center flex-1 hover:bg-neutral-200 duration-200 cursor-pointer ">
          <img src="/icons/upload.svg" class="w-10 h-10 " alt="">
          <p>Bukti Pembayaran</p>
        </div>
        <div
          onclick="showUploadModal('{{ '/pendanaan/tambah-bukti-bagi-hasil/' . $detailPendanaan->id_proyek_pendanaan }}', 'Upload Bukti Bagi Hasil', 'file_bukti_bagi_hasil', '{{ 'image/' . '*' }}' )"
          class="hover:text-yellow-500 py-1 flex flex-col items-center flex-1 hover:bg-neutral-200 duration-200 cursor-pointer ">
          <img src="/icons/upload.svg" class="w-10 h-10 " alt="">
          <p>Bukti Bagi Hasil</p>
        </div>
      </div>
      <div
        class="text-white bg-red-600 hover:text-red-600 rounded-md hover:bg-white hover:shadow-md hover:shadow-red-600/70 duration-200 w-[14rem] py-1 font-roboto font-medium text-xl text-center cursor-pointer my-4">
        Batalkan</div>
      @if (!empty(request()->get('showProgres')))
        <a href="/pendanaan/detail/{{ $detailPendanaan->id_proyek_pendanaan }}" class="flex flex-col items-center">
          <p class="text-teal-400 font-roboto font-medium">Sembunyikan Progres Pendanaan</p>
          <img src="/icons/up.svg" class="w-8 h-8" alt="">
        </a>
      @else
        <a href="/pendanaan/detail/{{ $detailPendanaan->id_proyek_pendanaan }}?showProgres=1" class="flex flex-col items-center">
          <p class="text-teal-400 font-roboto font-medium">Lihat Daftar Progres Pendanaan</p>
          <img src="/icons/down.svg" class="w-8 h-8" alt="">
        </a>
      @endif
    </div>
    @if (!empty(request()->get('showProgres')))
      <div
        class="w-[40rem] rounded-md bg-white grid grid-cols-12 text-neutral-700 font-medium font-roboto p-4 py-2 gap-2 shadow-[2px_3px_7px_0px_rgba(0,0,0,0.3)]">
        <p class="col-span-2 text-center">Tanggal</p>
        <p class="col-span-7 text-center">Keterangan</p>
        <p class="col-span-3 text-center">Laporan Keuangan</p>
        @foreach ($detailPendanaan->progresPendanaan as $key => $value)
          <div class="flex flex-col col-span-2 h-full justify-center">
            <p class="text-yellow-500">{{ $value->tanggal_laporan_progres_pendanaan }}</p>
          </div>
          <div class="flex-1 flex flex-col col-span-7 h-full justify-center">
            <div class="p-2 bg-neutral-200 rounded-md flex-1 text-justify">
              {{ $value->keterangan }}
            </div>
          </div>
          <div class="flex flex-col col-span-3 h-full w-full items-center justify-center">
            <a href="{{ $value->laporan_keuangan }}" class="hover:bg-neutral-200 duration-200">
              <img src="/icons/pdf.svg" class="w-12 h-12 object-cover object-center" alt="">
            </a>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</body>

</html>
