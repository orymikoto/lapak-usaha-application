<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')
  <script>
    function showUploadFileKontrak(id_pendanaan) {
      document.getElementById("upload_file_kontrak").classList.remove("hidden")
      document.getElementById("form_upload").action = `/pendanaan/tambah-file-kontrak/admin/${id_pendanaan}`
    }

    function hideUploadFileKontrak() {
      document.getElementById("upload_file_kontrak").classList.add("hidden")
    }
    const showDeleteModal = (link) => {
      document.getElementById("modal-delete-data").classList.remove("hidden")
      document.getElementById("modal-delete-data-link").href = `${link}`
      document.getElementById("modal-delete-data-main").scrollIntoView({
        behavior: 'smooth',
        block: 'start',
        inline: 'nearest'
      });
      window.scrollBy(0, -200);
    }

    const hideDeleteModal = () => {
      document.getElementById("modal-delete-data").classList.add("hidden")
      document.getElementById("modal-delete-data-link").href = "/"
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

  <title>Vestry</title>
</head>

<body class="antialiased bg-neutral-100 min-h-screen w-full flex flex-col overflow-y-scroll overflow-x-hidden relative">
  <div id="upload_file_kontrak" class="hidden absolute z-20 w-full h-full bg-neutral-600/50 flex items-center justify-center ">
    <form id="form_upload" action="" method="POST" class="p-4 rounded-md flex flex-col items-center bg-white gap-4 relative">
      @csrf
      <img onclick="hideUploadFileKontrak()" src="/icons/close.svg" class="w-6 h-6 right-2 top-2 cursor-pointer absolute" alt="">
      <h2 class="text text-neutral-700 font-righteous text-lg">Upload File Kontrak</h2>
      <div class="flex flex-col w-[20rem]">
        <p class="text-neutral-500 font-medium font-roboto mx-2 text-center">PROPOSAL</p>
        <input type="file" id="files" name="file_kontrak" accept="application/pdf" name="proposal" required
          class=" outline-none rounded-md file:cursor-pointer file:py-2 file:px-4 bg-neutral-100 file:rounded-md file:outline-none file:bg-neutral-200 file:text-yellow-500 hover:file:text-white hover:file:bg-yellow-500 file:duration-200 file:ring-0 file:border-none focus:ring-0 text-neutral-500 focus:text-yellow-500 font-medium font-roboto duration-200">
      </div>
      <button type="submit"
        class="px-4 py-1 rounded-md text-white bg-rose-600 hover:text-rose-600 hover:bg-white hover:shadow-md hover:shadow-rose-600 duration-200">Submit</button>
    </form>
  </div>
  <x-navbar />
  <x-modal-delete-data />
  <div class="flex flex-col items-center flex-1">
    <div class="flex rounded-full bg-neutral-400 text-neutral-700  w-[35rem] my-2 overflow-hidden font-medium font-roboto">
      <a href="{{ url()->current() . '?menu=0' }}"
        class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 items-center justify-center flex cursor-pointer text-center {{ request()->get('menu') == 0 || request()->get('menu') == null ? 'bg-yellow-500 text-white' : '' }}">Semua</a>
      <a href="{{ url()->current() . '?menu=1' }}"
        class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 items-center justify-center flex cursor-pointer text-center {{ request()->get('menu') == 1 ? 'bg-yellow-500 text-white' : '' }}">Tanpa
        File Kontrak</a>
      <a href="{{ url()->current() . '?menu=2' }}"
        class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 items-center justify-center flex cursor-pointer text-center {{ request()->get('menu') == 2 ? 'bg-yellow-500 text-white' : '' }}">Menunggu
        Persetujuan</a>
      <a href="{{ url()->current() . '?menu=3' }}"
        class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 items-center justify-center flex cursor-pointer text-center {{ request()->get('menu') == 3 ? 'bg-yellow-500 text-white' : '' }}">Sedang
        Berjalan</a>
      <a href="{{ url()->current() . '?menu=4' }}"
        class="py-2 hover:text-white hover:bg-yellow-500 flex-1 duration-200 items-center justify-center flex cursor-pointer text-center {{ request()->get('menu') == 3 ? 'bg-yellow-500 text-white' : '' }}">Selesai</a>
    </div>
    <div class="my-4 flex-col flex md:w-[90vw] gap-4">
      @if (count($daftarPendanaan) > 0)
        @php
          $total = 0;
        @endphp
        @foreach ($daftarPendanaan as $key => $value)
          @if (request()->get('menu') == 0 || request()->get('menu') == null)
            <x-item-pendanaan-admin :value="$value" :key="$total" />
            @php
              $total += 1;
            @endphp
          @elseif (request()->get('menu') == 1 && $value->file_kontrak_admin == null)
            <x-item-pendanaan-admin :value="$value" :key="$total" />
            @php
              $total += 1;
            @endphp
          @elseif (request()->get('menu') == 2 && $value->id_status_pendanaan == 1)
            <x-item-pendanaan-admin :value="$value" :key="$total" />
            @php
              $total += 1;
            @endphp
          @elseif (request()->get('menu') == 3 && $value->id_status_pendanaan == 2)
            <x-item-pendanaan-admin :value="$value" :key="$total" />
            @php
              $total += 1;
            @endphp
          @elseif (request()->get('menu') == 4 && $value->id_status_pendanaan == 3)
            <x-item-pendanaan-admin :value="$value" :key="$total" />
            @php
              $total += 1;
            @endphp
          @elseif($key == count($daftarPendanaan) - 1 && $total == 0)
            <div class="w-[90vw] h-[20rem] flex flex-col items-center justify-center rounded-lg bg-white">
              <h2 class="text-neutral-700 font-righteous text-xl">Nothing to Show Here Yet</h2>
              <img src="/images/nothing.jpg" class="h-[15rem]" alt="" srcset="">
            </div>
          @endif
        @endforeach
      @else
        <div class="w-[90vw] h-[20rem] flex flex-col items-center justify-center rounded-lg bg-white">
          <h2 class="text-neutral-700 font-righteous text-xl">This User Don't Have Any Pendanaan Yet</h2>
          <img src="/images/nothing.jpg" class="h-[15rem]" alt="" srcset="">
        </div>
      @endif

    </div>
  </div>

</body>

</html>
