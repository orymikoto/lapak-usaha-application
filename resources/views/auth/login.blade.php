<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>Login</title>
</head>

<body class="w-full h-screen flex items-center bg-gradient-to-br from-blue-950 to-neutral-800 justify-center">
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="/login"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">close</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif
  <div class="rounded-xl overflow-hidden flex lg:w-[60rem] md:w-[50rem] sm:w-[40rem] w-[30rem] h-[36rem] bg-neutral-100">
    <div class="md:w-[20rem] w-0 bg-[url('/images/auth-picture.jpg')] z-10 shadow-lg shadow-blue-950 bg-cover bg-center"></div>
    @if (empty(request()->get('role')))
      <div class="flex flex-col items-center justify-center w-full h-full bg-teal-700">
        <div class="flex flex-col items-center text-neutral-800 my-4">
          <img src="/images/logo.png" alt="vestry logo" class="w-40 h-16">
        </div>
        <div class="flex rounded-full h-[2rem] w-[21rem] overflow-hidden shadow-md shadow-black/80 bg-white">
          <a href="/login?role=admin"
            class="flex-1 text-center duration-200 cursor-pointer font-medium text-lg py-1 {{ request()->get('role') == 'admin' ? 'text-white bg-amber-400' : 'text-amber-400 hover:text-white  hover:bg-amber-400' }}">Admin</a>
          <a href="/login?role=pendana"
            class="flex-1 text-center duration-200 cursor-pointer font-medium text-lg py-1 {{ request()->get('role') == 'pendana' ? 'text-white bg-rose-700' : 'text-rose-700 hover:text-white  hover:bg-rose-700' }} ">Pendana</a>
          <a href="/login?role=pengusaha"
            class="flex-1 text-center duration-200 cursor-pointer font-medium text-lg py-1 {{ request()->get('role') == 'pengusaha' ? 'text-white bg-teal-600' : 'hover:text-white text-teal-600 hover:bg-teal-600' }}">Pengusaha</a>
        </div>
      </div>
    @else
      <div class="flex-1 flex flex-col items-center text-center gap-2">
        <div class="flex flex-col items-center text-neutral-800 mt-4 bg-neutral-800 p-4 rounded-lg">
          <img src="/images/logo.png" alt="vestry logo" class="w-40 h-16">
        </div>

        <h1 class="text-yellow-500 text-3xl font-semibold">Login</h1>
        <div class="flex flex-col items-center gap-y-1">
          <h2 class="text-neutral-700 font-medium text-lg">Jenis Akun</h2>
          <div class="flex rounded-full w-[21rem] overflow-hidden shadow-md shadow-black/80 bg-white">
            <a href="/login?role=admin"
              class="flex-1  duration-200 cursor-pointer font-medium text-lg py-1 {{ request()->get('role') == 'admin' ? 'text-white bg-amber-400' : 'text-amber-400 hover:text-white  hover:bg-amber-400' }}">Admin</a>
            <a href="/login?role=pendana"
              class="flex-1  duration-200 cursor-pointer font-medium text-lg py-1 {{ request()->get('role') == 'pendana' ? 'text-white bg-rose-700' : 'text-rose-700 hover:text-white  hover:bg-rose-700' }} ">Pendana</a>
            <a href="/login?role=pengusaha"
              class="flex-1  duration-200 cursor-pointer font-medium text-lg py-1 {{ request()->get('role') == 'pengusaha' ? 'text-white bg-teal-600' : 'hover:text-white text-teal-600 hover:bg-teal-600' }}">Pengusaha</a>
          </div>
        </div>
        <form action="/login?role={{ request()->get('role') }}" class="flex-1 flex-col flex gap-2" method="post">
          @csrf
          <div class="flex flex-col items-start w-[20rem]">
            <p class="text-yellow-500 font-medium mx-2">Email</p>
            <input type="email" placeholder="user@mail.com" name="email" required oninput="this.setCustomValidity('')"
              class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full  rounded-md py-1 px-2 focus:border-yellow-500">
          </div>
          <div class="flex flex-col items-start w-[20rem]">
            <p class="text-yellow-500 font-medium mx-2">Password</p>
            <input type="password" placeholder="password" name="password" required oninvalid="this.setCustomValidity('Semua data harus diisi')"
              autofocus="" oninput="this.setCustomValidity('')"
              class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full rounded-md py-1 px-2 focus:border-yellow-500">
          </div>
          <button type="submit"
            class="w-[15rem] text-white hover:text-yellow-500 hover:bg-white bg-yellow-500 rounded-full hover:shadow-md hover:shadow-black duration-200 py-1 cursor-pointer font-medium self-center my-2 text-lg">LOGIN</button>
          <div class="flex text-sm font-medium self-center">
            <p class="text-neutral-600">
              Doesn't have account?
              <a href="/register" class="hover:text-teal-400 duration-200">Sign Up</a>
            </p>
          </div>
        </form>
        @if (!empty($registered))
          <div class="bg-emerald-500 text-white font-medium text-sm text-center w-[20rem] my-8 rounded-full py-2">
            {{ $registered }}
          </div>
        @endif
      </div>
    @endif

  </div>
</body>

</html>
