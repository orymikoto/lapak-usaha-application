<div class="p-4 flex bg-white rounded-lg shadow-md gap-2 {{ $key >= 3 ? 'opacity-0 item' : 'animate-fade-in-left' }}">
  <img class="w-[16rem] object-cover object-center rounded-md"
    src="{{ $value->deskripsiUsaha->id_deskripsi_usaha > 3 ? asset('/storage' . $value->deskripsiUsaha->foto_usaha) : $value->deskripsiUsaha->foto_usaha }}"
    alt="" srcset="">
  <div class="flex flex-col gap-2 justify-start flex-1">
    <h2 class="text-yellow-500 font-righteous text-2xl">
      {{ $value->deskripsiUsaha->nama_usaha }}
    </h2>
    <div class="flex w-[21rem]">
      <p class="font-medium font-roboto text-neutral-700 flex-1">
        Pemilik Usaha
      </p>
      <p class="font-medium font-roboto text-neutral-700 flex-1 truncate">
        {{ ': ' . $value->pemilikUsaha->nama }}
      </p>
    </div>
    <div class="flex w-[21rem]">
      <p class="font-medium font-roboto text-neutral-700 flex-1">
        Pendana
      </p>
      <p class="font-medium font-roboto text-neutral-700 flex-1 truncate">
        {{ ': ' . $value->Pendana->nama }}
      </p>
    </div>
    <div class="flex w-[21rem]">
      <p class="font-medium font-roboto text-neutral-700 flex-1">
        Jumlah Dana
      </p>
      <p class="font-medium font-roboto text-neutral-700 flex-1 truncate">
        {{ ': ' . $value->jumlah_dana }}
      </p>
    </div>
    <div class="flex w-[21rem]">
      <p class="font-medium font-roboto text-neutral-700 flex-1">
        Nominal Bagi Hasil
      </p>
      <p class="font-medium font-roboto text-neutral-700 flex-1 truncate">
        {{ ': ' . $value->nominal_bagi_hasil }}
      </p>
    </div>
  </div>
  <div class="flex flex-col items-center justify-center cursor-pointer text-neutral-700 hover:text-yellow-500 duration-200 w-[9rem]">
    <a
      href="{{ $value->deskripsiUsaha->id_deskripsi_usaha > 3 ? asset('/storage' . $value->deskripsiUsaha->proposal) : $value->deskripsiUsaha->proposal }}">
      <img src="/icons/pdf.svg" class="w-12 h-12">
    </a>
    <p class="font-medium font-roboto w-[7rem] text-center">File Proposal
    </p>
  </div>
  <div class="flex flex-col items-center gap-1 justify-center">
    <h3 class="text-sm font-medium font-roboto text-neutral-400">Status Pendanaan</h3>
    <div
      class="select-none rounded-full w-40 text-center py-1 bg-neutral-400 text-neutral-700 text-xs {{ $value->id_status_pendanaan == 1 ? 'bg-yellow-500 text-white' : '' }}">
      Menunggu
      Persetujuan</div>
    <img src="/icons/next-down.svg" class="w-4 h-4" alt="">
    <div
      class="select-none rounded-full w-40 text-center py-1 bg-neutral-400 text-neutral-700 text-xs {{ $value->id_status_pendanaan == 2 ? 'bg-yellow-500 text-white' : '' }}">
      Sedang Berjalan
    </div>
    <img src="/icons/next-down.svg" class="w-4 h-4" alt="">
    <div
      class="select-none rounded-full w-40 text-center py-1 bg-neutral-400 text-neutral-700 text-xs {{ $value->id_status_pendanaan == 3 ? 'bg-yellow-500 text-white' : '' }}">
      Telah Selesai
    </div>
  </div>
  <div onclick="showUploadFileKontrak({{ $value->id_proyek_pendanaan }})"
    class="flex flex-col justify-center gap-2 text-center w-24 items-center text-neutral-600 hover:text-yellow-500 duration-200 cursor-pointer">
    <img src="/icons/upload.svg" class="w-8 h-8" alt="" srcset="">
    <p class="text-xs font-medium font-roboto ">{{ $value->file_kontrak_admin == null ? 'Upload File Kontrak' : 'Perbarui File Kontrak' }}</p>
  </div>
  <div class="flex rounded-full bg-neutral-400 text-neutral-700 w-[15rem] h-[2rem] my-auto overflow-hidden">
    <a href="/admin/pendanaan/detail/{{ $value->id_proyek_pendanaan }}"
      class="flex-1 py-1 hover:bg-amber-400 hover:text-white font-medium font-roboto duration-200 text-center cursor-pointer">Detail
    </a>
    <div
      class="flex-1 py-1  font-medium font-roboto duration-200 text-center cursor-default {{ $value->id_status_pendanaan == 1 ? 'hover:bg-red-500 hover:text-white cursor-pointer' : '' }}">
      Tolak
    </div>
  </div>
</div>
