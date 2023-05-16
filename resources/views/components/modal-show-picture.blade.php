<div id="show-picture" class=" hidden flex absolute z-20 items-center justify-center w-full h-full bg-neutral-600/60">
  <div class="bg-white p-4 rounded-md flex flex-col gap-2 items-center">
    <h2 class="text-neutral-700 font-medium font-righteous text-xl">{{$judul}}</h2>
    <img src="{{$urlFoto}}" class="w-[32rem] h-[18rem] rounded-md object-cover object-center" alt="">
    <div class="py-1 text-center font-medium font-roboto w-[7rem] text-white bg-red-600 rounded-md hover:text-red-600 hover:bg-white hover:shadow-md hover:shadow-red-600 duration-200">Close</div>
  </div>
</div>