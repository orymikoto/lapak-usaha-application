<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>Vestry</title>
</head>
<script>
  const showDeleteModal = (link) => {
    document.getElementById("modal-delete-data").classList.remove("hidden")
    document.getElementById("modal-delete-data-link").href = `${link}`
  }

  const hideDeleteModal = () => {
    document.getElementById("modal-delete-data").classList.add("hidden")
    document.getElementById("modal-delete-data-link").href = "/"
  }

  const showUpdateModal = (link, pesan) => {
    document.getElementById("modal-update-data").classList.remove("hidden")
    document.getElementById("modal-update-data-pesan").innerText = `${pesan}`
    document.getElementById("modal-update-data-link").href = `${link}`
  }
  const hideUpdateModal = () => {
    document.getElementById("modal-update-data").classList.add("hidden")
    document.getElementById("modal-update-data-pesan").innerText = ""
    document.getElementById("modal-update-data-link").href = "/"
  }

  function reveal() {
    var reveals = document.querySelectorAll(".item");

    for (var i = 0; i < reveals.length; i++) {
      var windowHeight = window.innerHeight;
      var elementTop = reveals[i].getBoundingClientRect().top;
      var elementVisible = 100;

      if (elementTop < windowHeight - elementVisible) {
        reveals[i].classList.add("animate-fade-in-left", "opacity-100");
      } else {
        reveals[i].classList.remove("animate-fade-in-left", "opacity-100");
      }
    }
  }

  window.addEventListener("scroll", reveal);
</script>

<body class="antialiased bg-neutral-200 min-h-screen w-full flex flex-col overflow-x-hidden ">
  <x-navbar />
  <x-modal-delete-data />
  <x-modal-update-data />
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="/admin/daftar-pencairan"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">close</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif

  <div class="flex flex-col items-center flex-1 my-4 gap-x-4 mx-4">
    {{-- NAVIGATION ADMIN PAGE --}}
    <div class="flex rounded-full bg-neutral-400 w-[40rem] overflow-hidden">
      <a href="/admin/daftar-pengusaha"
        class="flex-1 hover:bg-yellow-500 text-neutral-800 font-medium font-roboto py-1 text-center cursor-pointer hover:text-white duration-200">Daftar
        Pengusaha</a>
      <a href="/admin/daftar-pendana"
        class="flex-1 hover:bg-yellow-500 text-neutral-800 font-medium font-roboto py-1 text-center cursor-pointer hover:text-white duration-200">Daftar
        Pendana
      </a>
      <a href="/admin/daftar-pembayaran"
        class="flex-1 hover:bg-yellow-500 text-neutral-800 font-medium font-roboto py-1 text-center cursor-pointer hover:text-white duration-200">
        Daftar
        Pembayaran</a>
      <a class="flex-1 bg-yellow-500 font-medium font-roboto py-1 text-center cursor-pointer text-white duration-200">
        Daftar
        Pencairan</a>
    </div>

    {{-- LIST PROGRES PENDANAAN --}}
    <div class="flex flex-col mx-4 gap-4 items-center mb-8 w-full">
      <h1 class="text-yellow-500 font-righteous text-3xl text-center mt-4">Daftar Pencairan</h1>
      @if (count($pencairan) > 0)
        <div class="grid grid-cols-12 gap-4 my-4 w-[60rem] ">
          @foreach ($pencairan as $key => $value)
            <div class="animate-fade-in-down p-4 col-span-3 rounded-lg flex flex-col bg-white gap-2 items-center">
              <h2 class="font-righteous text-xl text-center">Rp. {{ number_format($value->nominal_pencairan) }}</h2>
              <p class="font-roboto font-medium text-neutral-600 text-sm text-center flex-1">{{ $value->tanggal_pencairan_dana }}</p>
              <a href="/admin/pendanaan/detail/{{ $value->id_proyek_pendanaan }}"
                class="text-sm text-neutral-600 hover:text-yellow-500 duration-200">Lihat Detail Pendanaan</a>
              <div class="flex flex-col w-full items-center text-neutral-800">
                <button {{ $value->status_pencairan == false ? 'disabled' : '' }}
                  onclick="showUpdateModal('{{ '/admin/pencairan/tolak/' . $value->id_pencairan_dana }}', 'Jadikan status pencairan menjadi Menunggu Persestujuan?')"
                  class="rounded-full bg-neutral-400 font-roboto text-sm w-full font-medium text-center cursor-default py-1 {{ $value->status_pencairan == false ? 'bg-yellow-500 text-white' : 'cursor-pointer hover:bg-yellow-500 hover:text-white duration-200' }}">Menunggu
                  Persetujuan</button>
                <img src="/icons/next-down.svg" class="w-4 h-4" alt="">
                <button {{ $value->status_pencairan == true ? 'disabled' : '' }}
                  onclick="showUpdateModal('{{ '/admin/pencairan/setujui/' . $value->id_pencairan_dana }}', 'Jadikan status pencairan menjadi Disetujui')"
                  class="rounded-full bg-neutral-400 font-roboto text-sm w-full font-medium text-center cursor-default py-1 {{ $value->status_pencairan == true ? 'bg-yellow-500 text-white' : 'cursor-pointer hover:bg-yellow-500 hover:text-white duration-200' }}">Berhasil
                  Dicairkan</button>
              </div>
              <button onclick="showDeleteModal('{{ '/admin/pencairan/hapus/' . $value->id_pencairan_dana }}')"
                class=" w-full rounded-full flex-1 text-center py-1 bg-red-600 text-white  hover:bg-white  hover:text-red-600 hover:shadow-md hover:shadow-red-600/50 duration-200 cursor-pointer">Hapus</button>
            </div>
          @endforeach
        </div>
      @else
        <div class="w-[50rem] h-[25rem] bg-[url('/images/nothing.jpg')] rounded-md bg-center bg-cover ">

        </div>
      @endif
      @if (auth('pengusaha')->check())
        <a href="{{ '/pencairan/ajukan/' . request()->route()->id_proyek_pendanaan }}"
          class="w-[10rem] py-1 rounded-full bg-emerald-400 text-white hover:bg-white hover:text-emerald-400 hover:shadow-md hover:shadow-emerald-400/50 duration-200 text-center font-roboto font-medium text-lg cursor-pointer">
          Tambah</a>
      @endif


    </div>
</body>

</html>
