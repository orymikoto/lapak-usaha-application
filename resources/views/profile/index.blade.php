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
  <x-navbar />
  <div class="flex flex-col flex-1 items-center">
    <h1 class="text-5xl font-righteous text-yellow-500 my-4">Profile</h1>
    <div class="w-[15rem] py-1 rounded-full text-white bg-emerald-600 text-center mb-6 select-none">
      <p>SEBAGAI {{ $role }}</p>
    </div>
    @if (auth('admin')->check())
      <x-form-profile-admin :detailUser="$detail_user" />
    @elseif(auth('pengusaha')->check())
      <x-form-profile-pengusaha :detailUser="$detail_user" />
    @elseif(auth('pendana')->check())
      <x-form-profile-pendana :detailUser="$detail_user" />
    @endif
  </div>
</body>

</html>
