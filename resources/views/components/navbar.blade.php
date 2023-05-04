<div class="w-full py-2 flex bg-neutral-800 px-8">
  <a href="/" class="flex flex-col items-center w-[14rem] cursor-pointer">
    <img src="/images/logo.png" class="w-40 h-16" alt="logo vestry">
    {{-- <p class="text-white text-sm font-semibold">Vestry Application</p> --}}
  </a>
  <div class="flex-1 flex items-center justify-center gap-x-4">
    @if (auth('pendana')->check() || auth('pengusaha')->check())
      <a href="" class="text-white text-lg font-medium font-roboto cursor-pointer hover:text-yellow-500 duration-200">Usaha</a>
      <a href="" class="text-white text-lg font-medium font-roboto cursor-pointer hover:text-yellow-500 duration-200">Pendanaan</a>
    @elseif(auth('admin')->check())
      <a href="" class="text-white text-lg font-medium font-roboto cursor-pointer hover:text-yellow-500 duration-200">Dashboard</a>
      <a href="" class="text-white text-lg font-medium font-roboto cursor-pointer hover:text-yellow-500 duration-200">Usaha</a>
      <a href="" class="text-white text-lg font-medium font-roboto cursor-pointer hover:text-yellow-500 duration-200">Pendanaan</a>
    @endif
  </div>

  @if (auth('pendana')->check() || auth('pengusaha')->check() || auth('admin')->check())
    <div class="flex gap-x-2 items-center">
      <a href="/profile"
        class="text-center w-[7rem] text-white text-lg font-medium font-roboto rounded-full py-1 bg-yellow-500 hover:bg-white hover:text-yellow-500 hover:shadow-md hover:shadow-yellow-500/50 cursor-pointer flex-1 duration-200">
        Profile
      </a>
      <a href="/logout"
        class="text-center w-[7rem] text-white text-lg font-medium font-roboto hover:bg-white rounded-full py-1 bg-red-700 hover:text-red-700 hover:shadow-md hover:shadow-red-500/50 cursor-pointer flex-1 duration-200">
        Logout</a>
    </div>
  @endif

  @if (!auth('pendana')->check() && !auth('pengusaha')->check() && !auth('admin')->check())
    <div class="flex gap-x-2 items-center w-[14rem]">
      <a href="/login"
        class="text-center text-white text-lg font-medium font-roboto hover:bg-white rounded-full py-1 bg-yellow-500 hover:text-yellow-500 hover:shadow-md hover:shadow-rose-500/50 cursor-pointer flex-1">
        Login</a>
      <a href="/register"
        class="text-center text-white text-lg font-medium font-roboto hover:bg-white rounded-full py-1 bg-rose-700 hover:text-rose-700 hover:shadow-md hover:shadow-yellow-500/50 cursor-pointer flex-1">
        Register</a>
    </div>
  @endif
</div>
