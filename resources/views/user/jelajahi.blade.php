@extends('layout.master')
@section('title', 'PicMe | Jelajahi')
@push('css')

@endpush
@section('content')
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3">
            <img src="" class="h-8" alt="" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PicMe</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0">
            <div class="gap-3">
                <a href="/login" class="inline-flex items-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-biru dark:focus:ring-blue-800">
                    Masuk
                </a>
                <a href="/daftar" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-pink dark:focus:ring-red-800">
                    Daftar
                </a>
            </div>
        </div>
    </div>
</nav>
<section class="flex flex-container mt-14">
     <div class="p-4 w-full">
          <div class="p-4 rounded-lg dark:border-gray-700">
              <div class="flex items-center justify-center h-32 md:h-32 lg:h-56 mb-4 rounded-xl bg-gray-50 dark:bg-gray-800 overflow-hidden">
                   <img src="{{ asset('Assets/images/logo-home.png') }}" alt="" class="w-full">
              </div>
              <div  id="kategori">
              <div class="flex gap-1 justify-start  overflow-x-auto overflow-y-hidden p-1">
                <div class="flex w-auto gap-2 p-1 mx-auto my-2 rounded-lg dark:bg-gray-600" >
                    <button type="button" class="border-2 px-5 py-1.5 bg-gray-200 text-xs font-medium text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700 rounded-lg">Semua</button>
                </div>
                 @foreach ($kategori as $kategoris)
                    <div class="flex w-auto gap-2 p-1 mx-auto my-2 rounded-lg dark:bg-gray-600" >
                        <button type="button" class="border-2 px-5 py-1.5 bg-blue-300                                                            text-xs font-medium text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700 rounded-lg">{{ $kategoris->nama }}</button>
                    </div>
                @endforeach
            </div>
            <div class="my-4 w-full md:w-[400px]">
                <form class="flex items-center" id="searchForm" method="get" action="/jelajahi">
                    <div class="relative w-full flex gap-2">
                        <input type="text" id="cari" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  py-2.5 px-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" name="cari"/>
                        {{-- <button id="submit" type="submit">hai</button> --}}
                    </div>
                </form>
             </div>
             </div>
              <!-- Profile user follow -->

              <!-- end profile user follow -->
              <hr class="bg-biru mb-4">
              <!-- content user follow -->
            <div class="gap-2 columns-2  md:columns-3 lg:columns-4 xl:columns-5" id="exploreData">

            </div>
             <!-- end content user follow -->
          </div>
    </div>
</section>

@endsection

@push('js')
    <script src="{{ asset('Assets/js/explore.js') }}"></script>
@endpush


