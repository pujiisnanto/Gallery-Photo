@extends('layout.master')
@section('title', 'PicMe | Detail Album')
@push('css')
    <link rel="stylesheet" href="{{ asset('Assets/css/lightbox.css') }}">
@endpush
@section('content')
    @include('user-admin.layout.header')
    @include('user-admin.layout.sidebar')

    <div class="p-4 sm:ml-64 min-h-screen">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div style="height: 300px;" class="flex items-center justify-center mb-4 rounded-xl bg-gray-50 dark:bg-gray-800 overflow-hidden">
                <img src="{{ asset('Assets/images/postingan/' .$album->thumbnail) }}" alt="" class="w-full object-cover">
           </div>
            <div class=" mb-4 p-4">
                <div class="flex justify-between mb-4">
                    <h1 class="text-pink text-2xl text-biru font-semibold">More Album</h1>
                    <!-- Modal toggle -->
                        <a href="/form-add-album" class="inline-flex items-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                        </a>
                    <!-- Main modal -->
                </div>
                <div class="flex gap-3 border-2 border-gray-50 overflow-x-auto overflow-y-hidden p-2">
                    {{-- @if($jmlalbum > 0) --}}
                        @foreach ($albums as $more)
                            <div class="flex-shrink-0">
                                <div class="flex items-center bg-white h-auto dark:bg-gray-800 rounded-xl w-auto">
                                    <div class="flex flex-col h-full">
                                        <figure class="w-full h-36">
                                           <a href="/detail-album/{{ $more->id }}">
                                              <img class="h-full w-full object-none rounded-lg" src="{{ asset('Assets/images/Postingan/' . $more->thumbnail) }}" alt="image description">
                                           </a>
                                        </figure>
                                        <div class="flex justify-between py-1 gap-4 items-center">
                                            <a href="/detail-album/{{ $more->id }}" class="text-sm font-serif w-[50%]">{{ $more->name }}</p>
                                            <div class="flex gap-1 items-center">
                                              <a href="/detail-album/{{ $more->id }}" class="text-sm text-pink font-mono">{{ $more->postingan->count() }}</p>
                                              <a href="/form-update-album/{{ $more->id }}"><i class="bi bi-pencil-square text-biru"></i></a>
                                              <a href="/delete-album/{{ $more->id }}"><i class="bi bi-trash3-fill text-pink"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         @endforeach
                </div>
            </div>
            <div class=" mb-4 p-4">
                <div class="flex justify-between mb-4 gap-4">
                    <h1 class="text-start text-xl lg:text-2xl text-biru font-semibold">{{ $album->name }}</h1>
                    <!-- Modal toggle -->
                    <button data-modal-target="plus-postingan" data-modal-toggle="plus-postingan"
                        class="inline-flex items-center gap-2 text-white bg-pink hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-pink dark:focus:ring-red-800"
                        type="button">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </button>
                    <!-- Main modal -->
                </div>

                <div class="gap-2 columns-4 sm:columns-2 md:columns-3 lg:columns-4">
                    @foreach ($postingan as $gambar)
                        <a href="{{ asset('Assets/images/Postingan/' . $gambar->name) }}" data-lightbox="models" data-title="{{ $gambar->judul }}">
                            <div class="mb-2 overflow-hidden cursor-pointer" data data-title="Nama Gambar">
                                <img class="h-auto w-full rounded-lg object-cover cursor-zoom-in transition ease-in-out scale-100 hover:scale-110 "
                                    src="{{ asset('Assets/images/Postingan/' . $gambar->name) }}"
                                    alt="">
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <div id="plus-postingan" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create New Product
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="plus-postingan">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="flex flex-col w-full mx-4  max-w-full px-2" action="/add-postingan" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col justify-center items-center w-full mb-5">
                            <!-- ... your file input content ... -->
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="w-full h-full overflow-hidden">
                                        <img id="preview-image" class="object-cover w-full h-full rounded-lg hidden"/>
                                    </div>
                                    <div class="absolute top-0 left-0 right-0 bottom-0 flex flex-col items-center justify-center pointer-events-none">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                        </div>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" name="name" onchange="previewImage(this)"/>
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center w-full md:w-full">
                            <div class="relative z-0 w-full mb-5 group">
                                <!-- ... your judul input content ... -->
                                <input type="text" name="judul" id="judul" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="judul" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Judul Postingan</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <div class="relative z-0 w-full group">
                                    <!-- ... your kategori select content ... -->
                                    <label for="Kategori" class="sr-only">Kategori</label>
                                    <select name="kategori" id="Kategori" class="block gap-2 py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                        <option selected>Kategori</option>
                                        @foreach ($kategori as $kategoris)
                                            <option value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $album->id }}" name="album">
                            <div class="relative z-0 w-full mb-5 group">
                                <div class="relative z-0 w-full group">
                                    <!-- ... your status select content ... -->
                                    <label for="Status" class="sr-only">Status</label>
                                    <select name="status" id="Status" class="block gap-2 py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                        <option selected >Status</option>
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>
                                    </select>
                                </div>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                <!-- ... your deskripsi input content ... -->
                                <input type="text" name="deskripsi" id="Deskripsi" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="Deskripsi" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deskripsi</label>
                            </div>
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
    <script src="{{ asset('Assets/js/lightbox-plus-jquery.js') }}"></script>
@endpush
