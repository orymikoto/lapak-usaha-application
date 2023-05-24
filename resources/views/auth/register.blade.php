<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>Register</title>
</head>

<body class="w-full h-screen flex items-center bg-gradient-to-br from-blue-950 to-neutral-800 py-12 justify-center overflow-y-scroll">
  <div class="rounded-xl overflow-hidden flex lg:w-[60rem] md:w-[50rem] sm:w-[40rem] w-[30rem] h-[40rem] my-8 bg-white">  
    <div class="md:w-[20rem] w-0 bg-[url('/images/auth-picture.jpg')] z-10 shadow-lg shadow-blue-950 bg-cover bg-center"></div>
    <div class="flex-1 flex flex-col items-center text-center gap-2">
      @if (session()->has('gagal'))
          <div class="flex w-full h-full items-center justify-center bg-teal-700">
            <div class="rounded p-4 bg-white shadow-md flex gap-2 flex-col w-[25rem] items-center">
              <h2 class="text-yellow-500 text-2xl font-righteous ">Pesan</h2>
              <p class="text-neutral-600 font-medium font-roboto">{{session()->get('gagal')}}</p>
              <a href="/register" class="rounded-md font-medium font-roboto w-[10rem] py-2 bg-red-500 text-white hover:bg-white hover:text-red-500 hover:shadow-md hover:shadow-red-500/50 duration-200 cursor-pointer">Kembali</a>
            </div>
          </div>
          {{session()->forget('gagal')}}
      @elseif (empty(request()->get('role')))
        <div class="flex flex-col items-center justify-center w-full h-full bg-teal-700">
          <div class="flex flex-col items-center text-neutral-800 my-4">
            <img src="/images/logo.png" alt="vestry logo" class="w-40 h-16">
          </div>
          <div class="flex rounded-full h-[2rem] w-[21rem] overflow-hidden shadow-md shadow-black/80 bg-white">
            <a href="/register?role=pendana"
              class="flex-1 text-center duration-200 cursor-pointer font-medium text-lg py-1 {{ request()->get('role') == 'pendana' ? 'text-white bg-rose-700' : 'text-rose-700 hover:text-white  hover:bg-rose-700' }} ">Pendana</a>
            <a href="/register?role=pengusaha"
              class="flex-1 text-center duration-200 cursor-pointer font-medium text-lg py-1 {{ request()->get('role') == 'pengusaha' ? 'text-white bg-teal-600' : 'hover:text-white text-teal-600 hover:bg-teal-600' }}">Pengusaha</a>
          </div>
        </div>
      @else
        <div class="flex flex-col items-center text-neutral-800 mt-4 bg-neutral-800 p-4 rounded-lg">
          <img src="/images/logo.png" alt="vestry logo" class="w-40 h-16">
        </div>
        <h1 class="text-yellow-500 text-3xl font-semibold">Register</h1>
        <div class="flex flex-col items-center gap-y-1">
          <h2 class="text-neutral-700 font-medium text-lg">Jenis Akun</h2>
          <div class="flex rounded-full w-[21rem] overflow-hidden shadow-md shadow-black/80 bg-white">
            <a href="/register?role=pendana"
              class="flex-1 py-1 duration-200 cursor-pointer font-medium text-lg {{ request()->get('role') == 'pendana' ? 'text-white bg-rose-700' : 'text-rose-700 hover:text-white  hover:bg-rose-700' }}">Pendana</a>
            <a href="/register?role=pengusaha"
              class="flex-1 py-1 duration-200 cursor-pointer font-medium text-lg {{ request()->get('role') == 'pengusaha' ? 'text-white bg-teal-600' : 'hover:text-white text-teal-600 hover:bg-teal-600' }} ">Pengusaha</a>
          </div>
        </div>
        <form action="/register?role={{ request()->get('role') }}" class="flex-1 flex-col flex gap-2" method="post">
          @csrf
          <div class="grid grid-cols-12 mx-2 p-4 gap-2">
            <div class="col-span-6 flex flex-col items-start">
              <p class="text-yellow-500 font-medium mx-2">Kota</p>
              <select type="text" name="kota"
                onchange="window.location.assign('{{ url()->current() . '?role=' . request()->get('role') . '&kota=' }}' + this.value)"
                class="outline-none w-full text-neutral-400 focus:ring-0 border-2 border-neutral-400 px-2 py-1 text-lg rounded-md  focus:text-yellow-500 focus:border-yellow-500 duration-200 ">
                @foreach ($city as $key => $value)
                  @if ($value->province_code == 35)
                    <option value="{{ $value->code }}" {{ $value->code == request()->get('kota') ? 'selected' : '' }}>
                      {{ $value->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="col-span-6 flex flex-col items-start">
              <p class="text-yellow-500 font-medium mx-2">Kecamatan</p>
              <select type="text" name="kecamatan" {{ empty(request()->get('kota')) ? 'disabled' : '' }}
                onchange="window.location.assign('{{ url()->current() . '?role=' . request()->get('role') . '&kota=' . request()->get('kota') . '&kecamatan=' }}' + this.value)"
                class="outline-none w-full text-neutral-400 focus:ring-0 border-2 border-neutral-400 px-2 py-1 text-lg rounded-md  focus:text-yellow-500 focus:border-yellow-500 duration-200 ">
                @foreach ($district as $key => $value)
                  @if ($value->city_code == request()->get('kota'))
                    <option value="{{ $value->code }}" {{ $value->code == request()->get('kecamatan') ? 'selected' : '' }}>
                      {{ $value->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="col-span-4 flex flex-col items-start">
              <p class="text-yellow-500 font-medium mx-2">Alamat Rumah</p>
              <input type="text" placeholder="alamat_rumah" name="alamat_rumah"
              required
              oninvalid="this.setCustomValidity('Semua data harus diisi')"
                {{ empty(request()->get('kota')) || empty(request()->get('kecamatan')) ? 'disabled' : '' }}
                class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full  rounded-md py-1 px-2 focus:border-yellow-500">
            </div>
            <div class="col-span-4 flex flex-col items-start">
              <p class="text-yellow-500 font-medium mx-2">Nama</p>
              <input type="text" placeholder="Nama Lengkap" name="nama"
              required
              oninvalid="this.setCustomValidity('Semua data harus diisi')"
                {{ empty(request()->get('kota')) || empty(request()->get('kecamatan')) ? 'disabled' : '' }}
                class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full  rounded-md py-1 px-2 focus:border-yellow-500">
            </div>
            <div class="col-span-4 flex flex-col items-start">
              <p class="text-yellow-500 font-medium mx-2">Email</p>
              <input type="email" placeholder="user@mail.com" name="email"
              required
                {{ empty(request()->get('kota')) || empty(request()->get('kecamatan')) ? 'disabled' : '' }}
                class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full  rounded-md py-1 px-2 focus:border-yellow-500">
            </div>
            <div class="col-span-4 flex flex-col items-start">
              <p class="text-yellow-500 font-medium mx-2">Username</p>
              <input type="text" placeholder="username" name="username"
              required
              oninvalid="this.setCustomValidity('Semua data harus diisi')"
                {{ empty(request()->get('kota')) || empty(request()->get('kecamatan')) ? 'disabled' : '' }}
                class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full  rounded-md py-1 px-2 focus:border-yellow-500">
            </div>
            <div class="col-span-4 flex flex-col items-start">
              <p class="text-yellow-500 font-medium mx-2">Password</p>
              <input type="password" placeholder="password" name="password"
              required
              oninvalid="this.setCustomValidity('Semua data harus diisi')"
                {{ empty(request()->get('kota')) || empty(request()->get('kecamatan')) ? 'disabled' : '' }}
                class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full rounded-md py-1 px-2 focus:border-yellow-500">
            </div>
            <div class="col-span-4 flex flex-col items-start">
              <p class="text-yellow-500 font-medium mx-2">No HP</p>
              <input type="text" placeholder="no_hp" name="no_hp"
                minlength="9" maxlength="13"
                required
              oninvalid="this.setCustomValidity('Semua data harus diisi')"
                {{ empty(request()->get('kota')) || empty(request()->get('kecamatan')) ? 'disabled' : '' }}
                class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full  rounded-md py-1 px-2 focus:border-yellow-500">
            </div>
            <div class="col-span-4 flex flex-col items-start">
              <p class="text-yellow-500 font-medium mx-2">No KTP</p>
              <input type="text" placeholder="no_ktp" name="no_ktp"
              minlength="16" maxlength="16"
              required
              oninvalid="this.setCustomValidity('Semua data harus diisi')"
                {{ empty(request()->get('kota')) || empty(request()->get('kecamatan')) ? 'disabled' : '' }}
                class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full  rounded-md py-1 px-2 focus:border-yellow-500">
            </div>
            <div class="col-span-4 flex flex-col items-start">
              <p class="text-yellow-500 font-medium mx-2">Bank</p>
              <select type="text" name="id_bank"
              required
              oninvalid="this.setCustomValidity('Semua data harus diisi')"
                class="outline-none focus:ring-0 border-2 w-full border-neutral-400  px-2 py-1 text-lg rounded-md text-neutral-400 focus:text-yellow-500 focus:border-yellow-500 duration-200 "
                {{ empty(request()->get('kota')) || empty(request()->get('kecamatan')) ? 'disabled' : '' }}>
                @foreach ($bank as $key => $value)
                  <option value="{{ $value->id_bank }}">{{ $value->nama_bank }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-span-4 flex flex-col items-start">
              <p class="text-yellow-500 font-medium mx-2">No Rekening</p>
              <input type="text" placeholder="no_ktp" name="no_rekening"
              minlength="10" maxlength="16"
              required
              oninvalid="this.setCustomValidity('Semua data harus diisi')"
                {{ empty(request()->get('kota')) || empty(request()->get('kecamatan')) ? 'disabled' : '' }}
                class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full  rounded-md py-1 px-2 focus:border-yellow-500">
            </div>
          </div>

          <button type="submit"
            class="w-[15rem] text-white hover:text-yellow-500 hover:bg-white bg-yellow-500 rounded-full hover:shadow-md hover:shadow-black duration-200 py-1 cursor-pointer font-medium self-center my-2 text-lg">REGISTER</button>
          <div class="flex text-sm font-medium self-center">
            <p class="text-neutral-600">
              Already have account?
              <a href="/login" class="hover:text-teal-400 duration-200">Sign In</a>
            </p>
          </div>
        </form>
      @endif

    </div>
  </div>
</body>

</html>
