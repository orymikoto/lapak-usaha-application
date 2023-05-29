<div id="modal-update-form-data" class="hidden w-full h-full z-10 flex items-center justify-center absolute bg-neutral-500/60">
  <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center relative w-[20rem]">
    <h2 class="text-lg">Update Data</h2>
    <img onclick="hideUpdateFormModal()" src="/icons/close.svg"
      class="w-8 h-8 right-2 top-2 cursor-pointer absolute rounded-full hover:bg-red-400/50 duration-200" alt="">
    <form id="modal-update-form-data-action" action="" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2 w-full items-center">
      @csrf
      <div class="col-span-4 flex flex-col items-start w-full">
        <p class="text-yellow-500 font-medium mx-2">Status Pendanaan</p>
        <select type="text" name="id_status_pendanaan" required oninvalid="this.setCustomValidity('Semua data harus diisi')"
          oninput="this.setCustomValidity('')"
          class="outline-none focus:ring-0 border-2 w-full border-neutral-400  px-2 py-1 text-lg rounded-md text-neutral-400 focus:text-yellow-500 focus:border-yellow-500 duration-200 ">
          @foreach ($statusPendanaan as $key => $value)
            <option value="{{ $value->id_status_pendanaan }}">{{ $value->nama_status }}
            </option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="py-1 rounded-md w-[7rem] text-white bg-emerald-400 hover:text-emerald-400 hover:bg-white hover:shadow-md hover:shadow-emerald-400/50 duration-200">Submit</button>
    </form>
  </div>
</div>
