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

  <div class="flex flex-col items-center flex-1 my-4 gap-x-4 mx-4">
    {{-- NAVIGATION ADMIN PAGE --}}
    <div class="flex rounded-full bg-neutral-400 w-[40rem] overflow-hidden">
      <a href="/admin/daftar-pengusaha"
        class="flex-1 hover:bg-yellow-500 text-neutral-800 font-medium font-roboto py-1 text-center cursor-pointer hover:text-white duration-200">Daftar
        Pengusaha</a>
      <a href="/admin/daftar-pendana"
        class="flex-1 bg-yellow-500 font-medium font-roboto py-1 text-center cursor-pointer text-white duration-200">Daftar Pendana
      </a>
      <a class="flex-1 hover:bg-yellow-500 text-neutral-800 font-medium font-roboto py-1 text-center cursor-pointer hover:text-white duration-200">
        Daftar
        Pembayaran</a>
      <a class="flex-1 hover:bg-yellow-500 text-neutral-800 font-medium font-roboto py-1 text-center cursor-pointer hover:text-white duration-200">
        Daftar
        Pencairan</a>
    </div>

    {{-- LIST USER --}}


  </div>
</body>

</html>
