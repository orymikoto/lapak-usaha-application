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

  <div class="flex w-full flex-1 my-4 gap-x-4">
    {{-- SIDEBAR --}}
    <div
      class="md:flex max-h-[30rem] hidden flex-col w-[15rem] bg-white rounded-r-lg text-left text-lg text-yellow-500 font-medium overflow-hidden z-10 shadow-lg shadow-black/50 ">
      <div class="font-semibold text-white bg-yellow-500 py-2 font-righteous px-4 cursor-default select-none">
        <p>Daftar Menu</p>
      </div>
      <div class="flex flex-col flex-1 justify-center font-medium font-roboto">
        <a href="/admin/daftar-usaha" class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Daftar Usaha</p>
        </a>
        <a class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Proyek Pendanaan</p>
        </a>
        <a href="/admin/daftar-pendana" class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Akun Pendana</p>
        </a>
        <a href="/admin/daftar-pengusaha" class="hover:bg-yellow-400 hover:text-white cursor-pointer duration-200 py-2 my-2 px-4">
          <p>Akun Pengusaha</p>
        </a>
      </div>
      <a class="py-2 px-4 hover:bg-red-500 bg-red-200 hover:text-white duration-200 font-semibold text-lg cursor-pointer text-red-500 ">
        Back to home
      </a>
    </div>

    {{-- LIST USER --}}
    <div class="flex-1 flex flex-col pr-6 relative gap-4">
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
