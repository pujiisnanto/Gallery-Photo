@extends('layout.master')
@section('title', 'PicMe | Beranda')
@section('content')
@include('user-admin.layout.header')
@include('user-admin.layout.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div
                class="flex items-center justify-center h-32 md:h-32 lg:h-36 mb-4 rounded-xl bg-gray-50 dark:bg-gray-800 overflow-hidden">
                <img src="{{ asset('Assets/images/5.jpg') }}" alt="" class="w-full">
            </div>

            <!-- Profile user follow -->
            <div class="mb-4 p-4">
                <div class="title mb-4">
                    <h1 class="text-start text-2xl text-blue-700 font-semibold">Diikuti</h1>
                </div>
                <div class="flex gap-3 border-2 border-gray-50 overflow-x-auto overflow-y-hidden p-2">
                    @if($jumlahpengikut > 0)
                        @foreach ($pengikut as $followers)
                            <div class="flex items-center border-2 justify-center bg-white max-h-28 dark:bg-gray-800 rounded-xl w-auto">
                                <div class="flex justify-between items-center p-2 gap-2 w-auto">
                                    <div class="lg:w-20 lg:h-20 w-16 h-16 md:w-16 md:h-16 rounded-full overflow-hidden border-2 shadow-xl">
                                        <a href="/user-profile/{{ $followers->mengikuti->id }}"><img src="{{ asset('Assets/images/user-profile/' . $followers->mengikuti->avatar) }}" alt="User-Profile"
                                            class="object-cover">
                                        </a>
                                    </div>
                                    <div class="flex text-white flex-col gap-2 w-auto">
                                        <a href="/user-profile/{{ $followers->mengikuti->id }}" class="flex items-center flex-col">
                                            <p class="md:text-md text-sm text-pink dark:text-gray-500 hover:text-blue-700" >{{ \Illuminate\Support\str::limit($followers->mengikuti->username, $limit = 17, $end = '...') }}</p>
                                            <p class="md:text-md text-sm text-biru dark:text-gray-500 hover:text-pink " >{{ \Illuminate\Support\str::limit($followers->mengikuti->email, $limit = 15, $end = '...') }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="flex w-full h-28 justify-center items-center gap-1">
                            <p class="text-pink">belum punya teman ? </p>
                            <a href="/pengikut" class="text-biru">ayo cari teman mu</a>
                        </div>
                    @endif

                </div>
            </div>
            <!-- end profile user follow -->
            <hr class="bg-blue-700 mb-4">
            <!-- content user follow -->
            <div class="gap-2 columns-2 md:columns-3 lg:columns-4" id="exploreData">
                @foreach ($dataPostingan as $data)
                    <div class="mb-2 overflow-hidden cursor-pointer">
                        <a href="/detail/{{ $data->id }}">
                            <img class="h-auto w-full rounded-lg object-cover cursor-zoom-in transition ease-in-out scale-100 hover:scale-110" src="{{ asset('Assets/images/Postingan/' . $data->name) }}" alt="{{ $data->judul }}"/>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
{{--
@push('js')
  <script src="{{ asset('Assets/js/explore.js') }}"></script>
@endpush --}}
