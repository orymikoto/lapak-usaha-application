<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>Profile</title>
</head>

<body class="antialiased bg-neutral-100 min-h-screen w-full flex flex-col overflow-y-scroll">
  @if (session()->has('updated'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{session()->get('updated')}}</p>
        <a href="/profile" class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">close</a>
      </div>
    </div>
    {{session()->forget('updated')}}
  @endif
  <x-navbar />
  <div class="flex flex-col flex-1 items-center">
    <h1 class="text-5xl font-righteous text-yellow-500 my-4">Profile</h1>
    <div class="w-[15rem] py-1 rounded-full text-white bg-emerald-600 text-center mb-6 select-none">
      <p>SEBAGAI {{ $role }}</p>
    </div>  
    @if (auth('admin')->check())
      <x-form-profile-admin :detailUser="$detail_user" :bank="$bank" />
    @elseif(auth('pengusaha')->check())
        <x-form-profile-pengusaha :detailUser="$detail_user" :province="$province" :city="$city" :district="$district" :bank="$bank" />
    @elseif(auth('pendana')->check())
      <x-form-profile-pendana :detailUser="$detail_user" :province="$province" :city="$city" :district="$district" :bank="$bank" />
    @endif
  </div>
</body>

</html>
