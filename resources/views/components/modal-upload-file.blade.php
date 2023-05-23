<div id="modal-upload-file" class="hidden w-full h-full z-20 absolute bg-neutral-600/60 flex items-center justify-center">
  <form id="modal-upload-file-form" action="" method="POST" class="p-4 rounded-md flex flex-col items-center bg-white gap-4 relative">
    @csrf
    <img onclick="hideUploadModal()" src="/icons/close.svg"
      class="w-8 h-8 right-2 top-2 cursor-pointer absolute rounded-full hover:bg-red-400/50 duration-200" alt="">
    <h2 id="modal-upload-file-judul" class="text text-neutral-700 font-righteous text-lg">Upload File Kontrak</h2>
    <div class="flex flex-col w-[20rem]">
      <p class="text-neutral-500 font-medium font-roboto mx-2">Silahkan pilih file</p>
      <input type="file" id="modal-upload-file-input" name="file_kontrak" accept="application/pdf" name="proposal" required
        class=" outline-none rounded-md file:cursor-pointer file:py-2 file:px-4 bg-neutral-100 file:rounded-md file:outline-none file:bg-neutral-200 file:text-yellow-500 hover:file:text-white hover:file:bg-yellow-500 file:duration-200 file:ring-0 file:border-none focus:ring-0 text-neutral-500 focus:text-yellow-500 font-medium font-roboto duration-200">
    </div>
    <button type="submit"
      class="px-4 py-1 rounded-md text-white bg-rose-600 hover:text-rose-600 hover:bg-white hover:shadow-md hover:shadow-rose-600 duration-200">Submit</button>
  </form>
</div>
