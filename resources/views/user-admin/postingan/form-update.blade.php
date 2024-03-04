@extends('layout.master')
@section('title', 'PicMe | Detail')
@section('content')
    @include('user-admin.layout.header')
    @include('user-admin.layout.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="flex flex-wrap justify-center">
            <form class="flex flex-col w-full md:w-1/2 mx-4 space-y-4 max-w-full" action="/update-postingan" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $postingan->id }}">
                <div class="flex flex-col justify-center w-full md:w-full">
                    <div class="relative z-0 w-full mb-5 group">
                        <!-- ... your judul input content ... -->
                        <input type="text" value="{{ $postingan->judul }}" name="judul" id="judul" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="judul" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Judul Postingan</label>
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <div class="relative z-0 w-full group">
                            <!-- ... your kategori select content ... -->
                            <label for="Kategori" class="sr-only">Kategori</label>
                            <select name="kategori" id="Kategori" class="block gap-2 py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                @foreach ($kategori as $kategoris)
                                    @if ($postingan->kategori_id == $kategoris->id)
                                        <option selected value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
                                    @else
                                        <option value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <div class="relative z-0 w-full group">
                            <!-- ... your kategori select content ... -->
                            <label for="album" class="sr-only">album</label>
                            <select name="album" id="album" class="block gap-2 py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                
                                @foreach ($album as $albums)
                                    @if ($albums->id == null)
                                        <option value="NULL" selected>album</option>
                                    @elseif ($postingan->album_id == $albums->id)
                                        <option selected value="{{ $albums->id }}">{{ $albums->name }}</option>
                                    @endif
                                    <option value="{{ $albums->id }}">{{ $albums->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <div class="relative z-0 w-full group">
                            <!-- ... your status select content ... -->
                            <label for="Status" class="sr-only">Status</label>
                            <select name="status" id="Status" class="block gap-2 py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                @if ($postingan->status == 'Public')
                                    <option selected value="$postingan->status">{{ $postingan->status }}</option>
                                    <option selected value="Private">Private</option>
                                @else
                                <option selected value="$postingan->status">{{ $postingan->status }}</option>
                                <option selected value="Public">Public</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <!-- ... your deskripsi input content ... -->
                        <input type="text" value="{{ $postingan->deskripsi }}" name="deskripsi"  id="Deskripsi" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="Deskripsi" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deskripsi</label>
                    </div>
                </div>

                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
        </div>
    </div>
@endsection
