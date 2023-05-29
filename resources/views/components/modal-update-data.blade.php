<div id="modal-update-data" class="hidden w-full h-full z-10 flex items-center justify-center absolute bg-neutral-500/60">
  <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
    <h2 class="text-lg">Pesan!</h2>
    <p id="modal-update-data-pesan" class="text-sm font-light text-neutral-400 w-[10rem]"></p>
    <div class="flex gap-x-2">
      <button
        class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50"
        onclick="hideUpdateModal()">Tidak</button>
      <a id="modal-update-data-link" href=""
        class="py-1 w-[7rem] text-center bg-emerald-400 text-white hover:text-emerald-400 hover:bg-white rounded-md hover:shadow-md hover:shadow-emerald-400/50">Ya</a>
    </div>
  </div>
</div>
