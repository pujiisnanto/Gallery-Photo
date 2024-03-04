@extends('layout.master')
@section('title', 'PicMe | Proifle')
@section('content')
@include('user-admin.layout.header')
@include('user-admin.layout.sidebar')
    <div class="p-4 sm:ml-64">
      <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="flex mb-4">
          <div class="flex items-center justify-center w-full h-full rounded-lg dark:bg-gray-800 border-gray-200 border-2">
            <div class="p-4 flex flex-col justify-center items-center">
                <div class="flex">
                    <div class=" flex w-32 h-32 overflow-hidden rounded-full bg-biru items-center">
                        <img src="{{ asset('Assets/images/user-profile/' . $user->avatar) }}" alt="" class="object-cover">
                    </div>
                    <div data-modal-target="plus-album" data-modal-toggle="plus-album" class="h-auto" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square bg-blue-100" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                          </svg>
                     </div>
                </div>

               <p class="text-pink mt-1">{{ $user->username }}</p>
               <a href=""><p class="text-biru">{{ $user->email }}</p></a>
               <div class="flex justify-between gap-1 py-2">
                    <a class="flex-col px-3 text-sm" href="">
                         <p class="text-center hover:text-pink">{{ $followers }}</p>
                         <p class="text-center hover:text-biru">Pengikut</p>
                    </a>
                    <a class="flex-col px-3 text-sm" href="">
                         <p class="text-center hover:text-pink">{{ $follow }}</p>
                         <p class="text-center hover:text-biru">Mengikuti</p>
                    </a>
                    <a class="flex-col px-3" href="">
                         <p class="text-center hover:text-pink text-sm">{{ $jumlahpostingan }}</p>
                         <p class="text-center hover:text-biru text-sm">Postingan</p>
                    </a>
               </div>
               <p class="flex text-gray-500 align-center" style="text-align: center;">
                {{ $user->bio }}
               </p>
               <div data-modal-target="edit-password" data-modal-toggle="edit-password" class="h-auto bg-blue-700 rounded-xl cursor-pointer py-1 px-2 text-white" type="button">
                Edit Password
                </div>
            </div>
          </div>
        </div>
        <hr class="bg-biru my-2" />
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
          <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
              <li class="me-1" role="presentation">
                  <button class="inline-flex p-2 items-center border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                    <svg class="w-4 h-4 me-2 hover:text-blue-600 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg>
                    Profile
                  </button>
              </li>
              <li class="me-1" role="presentation">
                  <button class="inline-flex items-center p-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="tersimpan-tab" data-tabs-target="#tersimpan" type="button" role="tab" aria-controls="tersimpan" aria-selected="false">
                    <svg class="w-4 h-4 me-2 hover:text-blue-600 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M7.8 2c-.5 0-1 .2-1.3.6A2 2 0 0 0 6 3.9V21a1 1 0 0 0 1.6.8l4.4-3.5 4.4 3.5A1 1 0 0 0 18 21V3.9c0-.5-.2-1-.5-1.3-.4-.4-.8-.6-1.3-.6H7.8Z"/>
                    </svg>
                    Tersimpan</button>
              </li>
              <li class="me-1" role="presentation">
                  <button class="inline-flex items-center p-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">
                    <svg class="w-4 h-4 me-2 hover:text-blue-600 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z"/>
                    </svg>Settings
                  </button>
              </li>
          </ul>
        </div>
        <div id="default-tab-content">
            {{-- profile --}}
          <div class="hidden p-2 rounded-lg border-2 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="grid grid-cols sm:grid-row">
              <form method="post" action="/update-profile" class="max-w-md mx-auto">
                @csrf
                <div class="mx-auto py-5">
                  <h1 class="text-biru text-xl font-semibold font-sans">Update Profile</h1>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                  <div class="relative z-0 w-full mb-5 group">
                      <input value="{{ $user->name}}" type="text" name="name2" id="name2" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                      <label for="name1" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                  </div>
                  <div class="relative z-0 w-full mb-5 group">
                      <input value="" type="text" name="name2" id="name2" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                      <label for="name2" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                  </div>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" value="{{ $user->username }}" name="username" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                  <input type="number" value="{{ $user->no_telepon }}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="no_telepon" id="no_telepon" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                  <label for="no_telepon" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                  <label for="jenis_kelamin" class="sr-only">Jenis Kelamin</label>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="block gap-2 py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">

                    @if($user->jenis_kelamin == 'Laki-laki')
                        <option value="Laki-laki" selected>Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    @else
                        <option value="Perempuan" selected>Perempuan</option>
                        <option value="Laki-laki">Laki-laki</option>
                    @endif
                  </select>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" value="{{ $user->bio }}" name="bio" id="floating_bio" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="floating_bio" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Bio</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" value="{{ $user->address }}" name="addres" id="floating_address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="floating_address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">address</label>
                </div>


                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
              </form>
            </div>
          </div>
          {{-- tersimpan --}}
          <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="tersimpan" role="tabpanel" aria-labelledby="tersimpan-tab">
            <div class="gap-2 columns-2 md:columns-3 lg:columns-4">
                @foreach ($like as $likes)
                    <div class="mb-2 overflow-hidden cursor-pointer">
                        <a href="/detail/{{ $likes->postingan_id }}">
                            <img class="h-auto w-full rounded-lg object-cover cursor-zoom-in transition ease-in-out scale-100 hover:scale-110" src="{{ asset('Assets/images/Postingan/' . $likes->postingan->name) }}" alt="">
                        </a>
                    </div>
                @endforeach
              </div>
          </div>
          {{-- setting --}}
          <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
              <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
          </div>
        </div>
      </div>
    </div>


    <div id="plus-album" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 z-auto overflow-y-auto">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Ubah Foto Profile
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="plus-album">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 over">
                 <form enctype="multipart/form-data" class="space-y-4" action="/change-avatar" method="post" class="max-w-full">
                    @csrf
                    <div class="flex items-center justify-center w-full mb-5">
                       <label for="dropzone-file" class="relative flex flex-col items-center justify-center w-36 h-36 border-2 border-gray-300 border-dashed rounded-full cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="w-full h-full overflow-hidden">
                                <img id="preview-image" src="{{ asset('Assets/images/user-profile/'. $user->avatar) }}" class="object-cover w-full h-full rounded-full"/>
                            </div>
                            <input id="dropzone-file" value="{{ $user->avatar }}" type="file" class="hidden" name="avatar" onchange="previewImage(this)"/>
                        </label>
                    </div>
                   <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                  </form>
            </div>
          </div>
        </div>
    </div>
    <div id="edit-password" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 z-auto overflow-y-auto">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Ubah Foto Profile
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-password">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 over">
                <form method="post" action="/change-password" class="max-w-md mx-auto">
                    @csrf
                    <div class="grid md:grid-cols-2 md:gap-6">
                      <div class="relative z-0 w-full mb-5 group">
                          <input type="password" name="password" id="name1" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                          <label for="name1" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password Baru</label>
                      </div>
                      <div class="relative z-0 w-full mb-5 group">
                          <input value="" type="password" name="confirmPassword" id="name2" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                          <label for="name2" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Konfirmasi Password</label>
                      </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="passwordLama" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password Lama</label>
                    </div>

                   <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                  </form>
            </div>
          </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('Assets/js/image-prview.js') }}"></script>
@endpush
