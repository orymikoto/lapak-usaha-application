<div class="w-[15rem] py-1 rounded-full text-white bg-emerald-600 text-center my-4 select-none">
  <p>SEBAGAI
    {{ auth('admin')->check() ? 'ADMIN' : '' }}{{ auth('pendana')->check() ? 'PENDANA' : '' }}{{ auth('pengusaha')->check() ? 'PENGUSAHA' : '' }}</p>
</div>

<div class="flex gap-x-2 my-8">
  <a class="flex flex-col cursor-pointer p-4 bg-white rounded-lg items-center w-[25rem] shadow-md hover:shadow-black/50 duration-200">
    <img src="/icons/city.svg" class="w-10 h-10" alt="" />
    <h2 class="text-yellow-500 text-xl font-medium">Daftar Usaha</h2>
    <p class="text-sm text-neutral-400 w-[15rem] text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos impedit, reprehenderit quia
      cupiditate,
      et quam.</p>
  </a>
  <a class="flex flex-col cursor-pointer p-4 bg-white rounded-lg items-center w-[25rem] shadow-md hover:shadow-black/50 duration-200">
    <img src="/icons/draft.svg" class="w-10 h-10" alt="" />
    <h2 class="text-yellow-500 text-xl font-medium">Pendanaan</h2>
    <p class="text-sm text-neutral-400 w-[15rem] text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos impedit, reprehenderit
      quia
      cupiditate,
      et quam.</p>
  </a>
</div>

<!-- Slider main container -->
<div class="swiper bg-white w-[50rem] h-[25rem] my-4 rounded-lg overflow-hidden shadow-md shadow-black/50">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide flex flex-col items-center">
      <h2 class="text-yellow-500 font-semibold text-2xl my-4">Usaha</h2>
      <div class="flex px-2">
        <div class="h-full min-w-[20rem] rounded-md bg-[url('/images/usaha.jpg')] bg-cover bg-center z-10 shadow-md shadow-black/40"></div>
        <p class="px-4 text-justify text-neutral-400 drop-shadow-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dolores
          sapiente nam
          corporis, quaerat dolor voluptatum dolorum ex rem veniam illum distinctio. Similique velit rem ad minima est libero eveniet delectus
          qui saepe modi. Consequatur natus maiores consectetur dolore iure earum sequi commodi, possimus harum fuga id error corporis nam aut,
          consequuntur est at voluptate provident laudantium. Eius quos nostrum unde ullam, saepe at ut ad asperiores voluptatum temporibus
          exercitationem itaque corporis et officiis quod voluptate illum quia mollitia nulla! Non voluptas velit eaque magnam voluptatum nihil
          doloremque! Harum quaerat magni necessitatibus ex, totam corporis ipsum accusamus adipisci nam doloribus!</p>
      </div>
    </div>
    <div class="swiper-slide flex flex-col items-center">
      <h2 class="text-yellow-500 font-semibold text-2xl my-4">Pendanaan</h2>
      <div class="flex px-2">
        <div class="h-full min-w-[20rem] rounded-md bg-[url('/images/finance.jpg')] bg-cover bg-center z-10 shadow-md shadow-black/40"></div>
        <p class="px-4 text-justify text-neutral-400 drop-shadow-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dolores
          sapiente nam
          corporis, quaerat dolor voluptatum dolorum ex rem veniam illum distinctio. Similique velit rem ad minima est libero eveniet delectus
          qui saepe modi. Consequatur natus maiores consectetur dolore iure earum sequi commodi, possimus harum fuga id error corporis nam aut,
          consequuntur est at voluptate provident laudantium. Eius quos nostrum unde ullam, saepe at ut ad asperiores voluptatum temporibus
          exercitationem itaque corporis et officiis quod voluptate illum quia mollitia nulla! Non voluptas velit eaque magnam voluptatum nihil
          doloremque! Harum quaerat magni necessitatibus ex, totam corporis ipsum accusamus adipisci nam doloribus!</p>
      </div>
    </div>

  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>
