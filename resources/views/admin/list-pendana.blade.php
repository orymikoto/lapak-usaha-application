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
      <a class="flex-1 bg-yellow-500 font-medium font-roboto py-1 text-center cursor-pointer text-white duration-200">Daftar Pendana
      </a>
      <a href="/admin/daftar-pembayaran"
        class="flex-1 hover:bg-yellow-500 text-neutral-800 font-medium font-roboto py-1 text-center cursor-pointer hover:text-white duration-200">
        Daftar
        Pembayaran</a>
      <a class="flex-1 hover:bg-yellow-500 text-neutral-800 font-medium font-roboto py-1 text-center cursor-pointer hover:text-white duration-200">
        Daftar
        Pencairan</a>
    </div>

    {{-- LIST USER --}}
    <div class="flex-1 flex flex-col relative gap-4">
      <h1 class="text-yellow-500 font-righteous text-3xl text-center my-4">Daftar Pendana</h1>
      <div class="bg-white p-2 rounded-md">
        <table class="w-full">
          <thead>
            <tr class="text-neutral-700">
              <th class="w-6 border border-yellow-500">No</th>
              <th class="border border-yellow-500">Nama</th>
              <th class="border border-yellow-500">Email</th>
              <th class="border border-yellow-500">No HP</th>
              <th class="border border-yellow-500">No KTP</th>
              <th class="border border-yellow-500">No Rek</th>
              <th class="border border-yellow-500">Pekerjaan</th>
              <th class="border border-yellow-500">Kota</th>
              <th class="border border-yellow-500">Kecamatan</th>
              <th class="border border-yellow-500">Alamat Rumah</th>
              <th class="border border-yellow-500">Bank</th>
            </tr>
          </thead>
          <tbody>
            {{-- {{ $list_user }} --}}
            @foreach ($list_user as $key => $value)
              <tr>
                <td class="text-center text-neutral-500 border border-yellow-500">{{ $key + 1 }}</th>
                <td class="text-center text-neutral-500 border border-yellow-500">{{ !empty($value->nama) ? $value->nama : 'kosong' }}</th>
                <td class="text-center text-neutral-500 border border-yellow-500">{{ !empty($value->email) ? $value->email : 'kosong' }}</th>
                <td class="text-center text-neutral-500 border border-yellow-500">{{ !empty($value->no_hp) ? $value->no_hp : 'kosong' }}</th>
                <td class="text-center text-neutral-500 border border-yellow-500">{{ !empty($value->no_ktp) ? $value->no_ktp : 'kosong' }}</th>
                <td class="text-center text-neutral-500 border border-yellow-500">{{ !empty($value->no_rekening) ? $value->no_ktp : 'kosong' }}</th>
                <td class="text-center text-neutral-500 border border-yellow-500">{{ !empty($value->pekerjaan) ? $value->pekerjaan : 'kosong' }}</th>
                <td class="text-center text-neutral-500 border border-yellow-500">{{ !empty($value->nama_kota) ? $value->nama_kota : 'kosong' }}</th>
                <td class="text-center text-neutral-500 border border-yellow-500">{{ !empty($value->name) ? $value->name : 'kosong' }}</th>
                <td class="text-center text-neutral-500 border border-yellow-500">
                  {{ !empty($value->alamat_rumah) ? $value->alamat_rumah : 'kosong' }}
                  </th>
                <td class="text-center text-neutral-500 border border-yellow-500">{{ !empty($value->nama_bank) ? $value->nama_bank : 'kosong' }}</th>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</body>

</html>
