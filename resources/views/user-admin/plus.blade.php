@extends('layout.master')
@section('title', 'PicMe | Postingan')
@section('content')
    @include('user-admin.layout.header')
    @include('user-admin.layout.sidebar')

   <div class="p-4 sm:ml-64">
      <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
          <div class="flex items-center justify-center h-32 md:h-32 lg:h-36 mb-4 rounded-xl bg-gray-50 dark:bg-gray-800 overflow-hidden">
               <img src="{{ asset('Assets/images/postingan/5.jpg') }}" alt="" class="w-full">
          </div>

          <!-- Profile user follow -->
          <div class=" mb-4 p-4">
            <div class="flex justify-between mb-4">
               <h1 class="text-start text-lg text-pink font-semibold">Album</h1>
               <a href="/form-add-album" class="inline-flex items-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                 </svg>
               </a>
            </div>
            <div class="flex gap-3 border-2 border-gray-50 overflow-x-auto overflow-y-hidden p-2">
                @if($jmlalbum > 0)
                    @foreach ($album as $albums)
                        <div class="flex-shrink-0">
                            <div class="flex items-center bg-white h-auto dark:bg-gray-800 rounded-xl w-auto">
                                <div class="flex flex-col h-full">
                                    <figure class="w-full h-36">
                                       <a href="/detail-album/{{ $albums->id }}">
                                          <img class="h-full w-full object-none rounded-lg" src="{{ asset('Assets/images/Postingan/' . $albums->thumbnail) }}" alt="image description">
                                       </a>
                                    </figure>
                                    <div class="flex justify-between py-1 gap-4 items-center">
                                        <a href="/detail-album/{{ $albums->id }}" class="text-sm font-serif w-[50%]">{{ $albums->name }}</p>
                                        <div class="flex gap-1 items-center">
                                          <a href="/detail-album/{{ $albums->id }}" class="text-sm text-pink font-mono">{{ $albums->postingan_count }}</p>
                                          <a href="/form-update-album/{{ $albums->id }}"><i class="bi bi-pencil-square text-biru"></i></a>
                                          <a href="/delete-album/{{ $albums->id }}"><i class="bi bi-trash3-fill text-pink"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     @endforeach
               @else
                    <div class="flex w-full h-28 justify-center items-center gap-1 text-xs text-center">
                        <p class="text-pink">belum punya album ?
                        <a href="/form-add-album" class="text-biru">ayo buat album mu</a>
                        </p>
                    </div>
                @endif
            </div>
          </div>

          <!-- end profile user follow -->

          <!-- content user follow -->
          <div class=" mb-4 p-4">
               <div class="flex justify-between mb-4">
                    <h1 class="text-start text-lg text-biru font-semibold">Postingan</h1>
                    <a href="/form-add-postingan" class="inline-flex items-center gap-2 text-white bg-pink hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-pink dark:focus:ring-red-800">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                         </svg>
                    </a>
                     <!-- Main modal -->
               </div>

               <div class="gap-2 columns-2 md:columns-3 lg:columns-4" id="exploreData" data-explore="" data-kategori="">

              </div>
             </div>
         <!-- end content user follow -->
      </div>
   </div>

@endsection

@push('js')
    <script src="{{ asset('Assets/js/plus-postingan.js') }}"></script>
@endpush
