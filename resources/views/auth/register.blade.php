<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>Register</title>
</head>

<body class="w-full h-screen flex items-center bg-gradient-to-br from-blue-950 to-neutral-800 justify-center">
  <div class="rounded-xl overflow-hidden flex lg:w-[60rem] md:w-[50rem] sm:w-[40rem] w-[30rem] h-[36rem] bg-white">
    <div class="md:w-[20rem] w-0 bg-[url('/images/auth-picture.jpg')] z-10 shadow-lg shadow-blue-950 bg-cover bg-center"></div>
    <div class="flex-1 flex flex-col items-center text-center gap-2">
      <div class="flex flex-col items-center text-neutral-800 mt-4">
        <img src="/images/logo.png" alt="vestry logo" class="w-10 h-10">
        <h2 class="text-lg font-bold">Vestry Application</h2>
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
        <div class="flex flex-col items-start w-[20rem]">
          <p class="text-yellow-500 font-medium mx-2">Nama</p>
          <input type="text" placeholder="User Name" name="nama"
            class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full  rounded-md py-1 px-2 focus:border-yellow-500">
        </div>
        <div class="flex flex-col items-start w-[20rem]">
          <p class="text-yellow-500 font-medium mx-2">Email</p>
          <input type="email" placeholder="user@mail.com" name="email"
            class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full  rounded-md py-1 px-2 focus:border-yellow-500">
        </div>
        <div class="flex flex-col items-start w-[20rem]">
          <p class="text-yellow-500 font-medium mx-2">Username</p>
          <input type="text" placeholder="username" name="username"
            class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full  rounded-md py-1 px-2 focus:border-yellow-500">
        </div>
        <div class="flex flex-col items-start w-[20rem]">
          <p class="text-yellow-500 font-medium mx-2">Password</p>
          <input type="password" placeholder="password" name="password"
            class="outline-none text-neutral-400 font-medium placeholder:text-neutral-400 border-2 border-neutral-400 focus:text-yellow-500 duration-200 w-full rounded-md py-1 px-2 focus:border-yellow-500">
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
    </div>
  </div>
</body>

</html>
