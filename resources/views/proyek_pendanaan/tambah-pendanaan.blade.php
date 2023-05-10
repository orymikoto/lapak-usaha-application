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
  <div class="flex flex-col">
    <h1 class="text-3xl font-righteous text-yellow-500 my-4">Tambah Pendanaan</h1>
    <div class="flex md:flex-row flex-col">
      {{-- DESKRIPSI USAHA --}}
      <div></div>

      {{-- FORMULIR PENDANAAN --}}
      <div></div>
    </div>
  </div>
</body>

</html>
