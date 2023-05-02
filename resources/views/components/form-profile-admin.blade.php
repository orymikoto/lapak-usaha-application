<form action="/profile/edit" method="POST" class="relative grid grid-cols-12 p-4 gap-2 w-[50rem] bg-white rounded-lg shadow-md shadow-black/50">
  @csrf
  @if (request()->get('edit') == 'true')
    <a href="/profile"
      class="bg-red-400/50 text-center absolute right-4 top-4 rounded-full px-4 py-1 text-white cursor-pointer hover:bg-red-500 duration-200">
      cancel
    </a>
  @endif
 
  <div class="col-start-4 col-end-10 bg-yellow-500/80  rounded-lg py-2 text-white text-center font-righteous text-2xl">
    <p>{{ request()->get('edit') == 'true' ? 'Edit' : 'Detail' }} User</p>
  </div>
  <div class="col-span-6 py-1 flex flex-col text-neutral-500 font-medium font-roboto">
    <p class="text-neutral-700 mx-2">USERNAME</p>
    <input type="text" name="username"
      class="outline-none focus:ring-0 border-2 border-neutral-400 px-2 py-1 text-lg rounded-md bg-neutral-200/50 focus:text-yellow-500 focus:border-yellow-500 duration-200 focus:bg-yellow-100/25"
      {{ request()->get('edit') != 'true' ? 'disabled' : '' }} value="{{ $detailUser->username }}">
  </div>
  <div class="col-span-6 py-1 flex flex-col text-neutral-500 font-medium font-roboto">
    <p class="text-neutral-700 mx-2">EMAIL</p>
    <input type="email" name="email"
      class="outline-none focus:ring-0 border-2 border-neutral-400 px-2 py-1 text-lg rounded-md bg-neutral-200/50 focus:text-yellow-500 focus:border-yellow-500 duration-200 focus:bg-yellow-100/25"
      {{ request()->get('edit') != 'true' ? 'disabled' : '' }} value="{{ $detailUser->email }}">
  </div>
  <div class="col-span-6 py-1 flex flex-col text-neutral-500 font-medium font-roboto">
    <p class="text-neutral-700 mx-2">BANK</p>
    <select type="text" name="id_bank"
      class="outline-none focus:ring-0 border-2 border-neutral-400 px-2 py-1 text-lg rounded-md bg-neutral-200/50 focus:text-yellow-500 focus:border-yellow-500 duration-200 focus:bg-yellow-100/25"
      {{ request()->get('edit') != 'true' ? 'disabled' : '' }}>
      @foreach ( $bank as $key => $value )
        <option value="{{$value->id_bank}}" {{$value->id_bank == $detailUser->id_bank ? 'selected' : ''}}>{{$value->nama_bank}}</option>
      @endforeach
    </select>
  </div>
  <div class="col-span-6 py-1 flex flex-col text-neutral-500 font-medium font-roboto">
    <p class="text-neutral-700 mx-2">NO REKENING</p>
    <input type="text" name="no_rekening"
      class="outline-none focus:ring-0 border-2 border-neutral-400 px-2 py-1 text-lg rounded-md bg-neutral-200/50 focus:text-yellow-500 focus:border-yellow-500 duration-200 focus:bg-yellow-100/25"
      {{ request()->get('edit') != 'true' ? 'disabled' : '' }} value="{{ !empty($detailUser->no_rekening) ? $detailUser->no_rekening  : '-' }}">
  </div>
  @if (request()->get('edit') == 'true')
    <button type="submit"
      class="col-start-4 col-end-10 text-center  py-2 my-2 font-roboto font-medium text-white bg-rose-700 rounded-full hover:text-rose-700 hover:bg-white hover:shadow-md hover:shadow-rose-700/50 cursor-pointer duration-200">
      <p>UPDATE PROFILE</p>
    </button>
  @else
    <a href="/profile?edit=true"
      class="col-start-4 col-end-10 text-center  py-2 my-2 font-roboto font-medium text-white bg-rose-700 rounded-full hover:text-rose-700 hover:bg-white hover:shadow-md hover:shadow-rose-700/50 cursor-pointer duration-200">
      <p>EDIT PROFILE</p>
    </a>
  @endif
</form>
