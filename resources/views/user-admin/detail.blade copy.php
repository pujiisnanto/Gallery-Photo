@extends('layout.master')
@section('title', 'PicMe | Detail')
@section('content')
    @include('user-admin.layout.header')
    @include('user-admin.layout.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="flex flex-col px-2 flex-container">
                <div class="w-full xl:flex xl:gap-4">
                    <div class="xl:w-1/2 w-full">
                        <div class="flex justify-center w-full xl:w-full">
                            <img src="{{ asset('Assets/images/Postingan/' . $detail->name) }}" alt="Postingan"
                                class="w-full md:max-h-80 xl:h-full max-h-56 h-auto max-w-xl ">
                        </div>
                    </div>
                    <div class="xl:w-1/2 items-center xl:mt-0 gap-4 w-full">
                        <div class="flex flex-col mt-2 md:mt-0 md:justify-between">
                            <div class="flex flex-col ">
                                <div class="flex justify-between gap-4">
                                    <div class="lg:text-xl font-semibold">
                                        <h1>{{ $detail->judul }}</h1>
                                    </div>

                                    <div data-popover-target="likeTooltip" class="flex gap-1 items-center">
                                        <div class="like-button" data-postingan-id="{{ $detail->id }}"
                                            data-liked="{{ $isLiked ? 'true' : 'false' }}">
                                            <small id="CountLike">{{ $like->count() }}</small>
                                            <button type="button"
                                                class="bi {{ $isLiked ? 'bi-heart-fill' : 'bi-heart' }}"></button>
                                        </div>
                                    </div>
                                    <div data-popover id="likeTooltip" role="tooltip"
                                        class="border-dashed absolute z-10 invisible inline-block w-auto p-2 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                        <h1>{{ $isLiked ? 'disLike' : 'Like' }}</h1>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col">
                                    <small class="text-gray-500 mt-2">{{ $detail->deskripsi }}</small>
                                    <small class="text-gray-500 mt-2">Upload :
                                        {{ $detail->created_at->format('d M Y') }}</small>
                                    <small class="text-gray-500">Kategori : {{ $detail->kategori->nama }}</small>
                                    @if (Auth::check())
                                        <small class="text-pink">Status : {{ $detail->status }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="w-full py-2">
                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-4">
                                    <a href="/user-profile/{{ $detail->user->id }}">
                                        <img src="{{ asset('Assets/images/user-profile/' . $detail->user->avatar) }}"
                                            class="w-10 h-10 object-cover rounded-full" alt="User-Profile">
                                    </a>
                                    <div class="flex flex-col">
                                        <a href="/user-profile/{{ $detail->user_id }}"
                                            class="text-md font-semibold">{{ \Illuminate\Support\str::limit($detail->user->username, $limit = 10, $end = '...') }}</a>
                                        <small class="text-xs text-gray-500">100 Pengikut</small>
                                    </div>
                                </div>
                                <div class="md:flex">
                                    @if ($detail->user_id == auth()->user()->id)
                                        <div class="flex items-center gap-1 text-sm">
                                            <a href="/form-update-postingan/{{ $detail->id }}"
                                                class="px-2 py-1 rounded-xl text-center bg-blue-500 text-white">Edit</a>
                                            <a href="/delete-postingan/{{ $detail->id }}"
                                                class="px-2 py-1 rounded-xl text-center bg-red-700 text-white">Hapus</a>
                                        </div>
                                    @else
                                        <div id="follow" class="follow-button" data-user-id="{{ $detail->user_id }}"
                                            data-following="{{ $isFollowing ? 'true' : 'false' }}">
                                            @csrf
                                            <button type="button" class="text-sm text-biru">
                                                {{ $isFollowing ? 'Unfollow' : 'Follow' }}
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div id="accordion-flush" data-accordion="collapse"
                        data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                        data-inactive-classes="text-gray-500 dark:text-gray-400">
                        <h2 id="accordion-flush-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                                data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                                aria-controls="accordion-flush-body-1">
                                <span>Komentar</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                            <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                <form id="formKomentar" class="flex gap-2">
                                    @csrf
                                    <div class="w-full">
                                        <input type="hidden" name="postinganId" value="{{ $detail->id }}" />
                                        <input type="text" placeholder="ketik komentar" name="komentar" id="commentText"
                                            class="py-2 w-full px-4 rounded-xl border-gray-200">
                                    </div>
                                    <button type="submit" class="px-4 rounded-xl bg-blue-500 text-white" name="submit">
                                        <span class="bi bi-send"></span>
                                    </button>
                                </form>
                                <hr class="bg-gray-500 my-4">
                                <div style="max-height: 300px" class="max-h-96 overflow-x-hidden overflow-y-auto"
                                    id="exploreKomentar" data-postingan="{{ $detail->id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-gray-500 my-4">
            <div class="gap-2 columns-2 md:columns-3 lg:columns-4" id="exploreData"
                data-kategori="{{ $detail->kategori_id }}">
            </div>
        </div>
    @endsection
    @push('js')
<script>
    $(document).ready(function(){
        $('#formKomentar').submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false
            });

            $.ajax({
                url: '/upload-Komentar',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if(response.status === 200) {
                        loadMoreData(paginate);
                    } else {
                        console.error('Error:', response.data);
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

        <script>
            let page = 1;
            let dataExploreDetail = [];

            loadData(page);
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                    page++;
                    loadData(page);
                }
            });

            function loadData(page) {
                let data = document.querySelector('[data-kategori]');
                let dataKategori = data.getAttribute('data-kategori');
                $.ajax({
                    url: '/getExploreDetail/' + dataKategori + '?page=' + page,
                    type: "GET",
                    dataType: "JSON",
                    success: function(response) {
                        let newData = response.datas.data; // Sesuaikan dengan struktur respons dari server
                        dataExploreDetail = dataExploreDetail.concat(newData);
                        console.log(dataExploreDetail);
                        getExplore();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                    }
                })
            }

            const getExplore = () => {
                $('#exploreData').html('');
                dataExploreDetail.map((x, i) => {
                    $('#exploreData').append(
                        `<div class="mb-2 overflow-hidden cursor-pointer">
                    <a href="/details/${x.id}">
                        <img class="h-auto w-full rounded-lg object-cover cursor-zoom-in transition ease-in-out scale-100 hover:scale-110" src="Assets/images/Postingan/${x.name}" alt="${x.judul}"/>
                    </a>
                </div>`
                    );
                });
            };
        </script>

        </script>
        <script src="{{ asset('Assets/js/likes.js') }}"></script>
        <script src="{{ asset('Assets/js/follow.js') }}"></script>
        <script src="{{ asset('Assets/js/komentar.js') }}"></script>
    @endpush
