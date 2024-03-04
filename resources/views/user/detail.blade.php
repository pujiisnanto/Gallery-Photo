
@extends('layout.master')
@section('title', 'PicMe | Detail')
@section('content')
<nav class="bg-white dark:bg-gray-900 sticky w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
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

<section class="">
    <div class="p-6 rounded-lg dark:border-gray-700">
        <div class="flex flex-col px-2 flex-container">
            <div class="w-full xl:flex xl:gap-4">
                <div class="xl:w-1/2 w-full">
                    <div class="flex justify-center w-full xl:w-full">
                        <img src="{{ asset('Assets/images/Postingan/' . $detail->name) }}" alt="Postingan" class="w-full md:max-h-80 xl:h-full max-h-56 h-auto max-w-xl ">
                    </div>
                </div>
                <div class="xl:w-1/2 items-center xl:mt-0 gap-2 w-full">
                  <div class="flex flex-col mt-2 md:mt-0 md:justify-between">
                    <div class="flex flex-col ">
                      <div class="flex justify-between gap-4">
                          <div class="lg:text-xl font-semibold">
                              <h1>{{ $detail->judul }}</h1>
                          </div>
                          @if (Auth::check())
                          <div data-popover-target="likeTooltip" class="flex gap-1 items-center">
                            <div class="like-button" data-postingan-id="{{ $detail->id }}"
                                data-liked="{{ $isLiked ? 'true' : 'false' }}">
                                <small id="CountLike">{{ $like->count() }}</small>
                                <button type="button" class="bi {{ $isLiked ? 'bi-heart-fill' : 'bi-heart' }}"></button>
                            </div>
                        </div>
                        <div data-popover id="likeTooltip" role="tooltip" class="border-dashed absolute z-10 invisible inline-block w-auto p-2 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <h1>{{ $isLiked ? 'disLike' : 'Like' }}</h1>
                        </div>
                        @else
                            <div data-popover-target="likeTooltip" class="flex gap-1 items-center">
                                <div class="like-button">
                                    <small id="CountLike">{{ $like->count() }}</small>
                                    <a href="/login"><button type="button" class="bi bi-heart"></button></a>
                                </div>
                            </div>
                            <div data-popover id="likeTooltip" role="tooltip" class="border-dashed absolute z-10 invisible inline-block w-auto p-2 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                <h1></h1>
                            </div>
                          @endif

                      </div>
                      <div class="w-full">
                            <small class="text-gray-500">{{ $detail->deskripsi }}</small>
                      </div>
                    </div>
                    <div class="flex gap-2">
                      {{-- <div data-popover-target="Download" class="p-2 bg-gray-200 w-auto rounded-xl">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                              <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708"/>
                          </svg>
                        </div>
                        <div data-popover id="Download" role="tooltip" class="absolute z-10 invisible inline-block w-auto p-2 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 border-dashed rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <h1>Download</h1>
                        </div> --}}

                        {{-- <div data-popover-target="simpan" class="flex p-2 bg-gray-200 w-auto rounded-xl gap-2 cursor-pointer">
                            <i class="bi bi-floppy-fill"></i>
                        </div>
                        <div data-popover id="simpan" role="tooltip" class="border-dashed absolute z-10 invisible inline-block w-auto p-2 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <h1>Simpan</h1>
                        </div> --}}
                  </div>
                  </div>

                    <div class="w-full py-2">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-4">
                                <a href="/user-profile/{{ $detail->user->id }}">
                                    <img src="{{ asset('Assets/images/user-profile/'. $detail->user->avatar) }}" class="w-10 h-10 object-cover rounded-full" alt="User-Profile">
                                </a>
                                <div class="flex flex-col">
                                    <a href="/user-profile/{{ $detail->user_id }}" class="text-md font-semibold">{{ \Illuminate\Support\str::limit($detail->user->username, $limit = 10, $end = '...') }}</a>
                                    <small class="text-xs text-gray-500">100 Pengikut</small>
                                </div>
                            </div>
                            <div class="md:flex">
                                @if (Auth::check())
                                @if ($detail->user_id == auth()->user()->id)
                                    <div class="flex items-center gap-1 text-sm">
                                        <a href="/form-update-postingan/{{ $detail->id }}" class="px-2 py-1 rounded-xl text-center bg-blue-500 text-white">Edit</a>
                                        <a href="/delete-postingan/{{ $detail->id }}" class="px-2 py-1 rounded-xl text-center bg-red-700 text-white">Hapus</a>
                                    </div>
                                @else

                                    <div id="follow" class="follow-button"
                                        data-user-id="{{ $detail->user_id }}"
                                        data-following="{{ $isFollowing ? 'true' : 'false' }}">
                                        @csrf
                                        <button type="button" class="text-sm text-biru">
                                            {{ $isFollowing ? 'Unfollow' : 'Follow' }}
                                        </button>
                                    </div>
                                @endif
                                @else
                                <a href="/login">
                                    <button class="text-sm text-biru">Follow</button>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:px-6 xl:px-6">
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                    <h2 id="accordion-flush-heading-1">
                      <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                        <span>Komentar</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                      </button>
                    </h2>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                       <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                          <form id="formKomentar" class="flex gap-2">
                              @csrf
                              <div class="w-full">
                                  <input type="hidden" name="postinganId" value="{{ $detail->id }}" />
                                  <input type="text" placeholder="ketik komentar" name="komentar" id="commentText" class="py-2 w-full px-4 rounded-xl border-gray-200">
                              </div>
                              <button type="submit" class="px-4 rounded-xl bg-blue-500 text-white">
                                  <span class="bi bi-send"></span>
                              </button>
                          </form>
                        <hr class="bg-gray-500 my-4">
                        <div style="max-height: 300px" class="max-h-96 overflow-x-hidden overflow-y-auto" id="exploreKomentar" data-postingan="{{ $detail->id }}">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      <hr class="bg-gray-500 my-4">
      <div class="gap-2 columns-2 md:columns-3 lg:columns-4" id="exploreData" data-kategori="{{ $detail->kategori_id }}">

      </div>
</section>
  @endsection
  @push('js')
  <script>
      let page = 1;
      let dataExploreDetail = [];

      loadData(page);
      $(window).scroll(function(){
          if($(window).scrollTop() + $(window).height() >= $(document).height()){
              page++;
              loadData(page);
          }
      });

      function loadData(page){
          let data = document.querySelector('[data-kategori]');
          let dataKategori = data.getAttribute('data-kategori');
          $.ajax({
              url: '/getExploreDetail/' + dataKategori + '?page=' + page, // Perbaiki URL
              type: "GET",
              dataType: "JSON",
              success: function (response) {
                  let newData = response.datas.data; // Perbaiki struktur response
                  dataExploreDetail = dataExploreDetail.concat(newData);
                  console.log(dataExploreDetail)
                  getExplore();
              },
              error: function(jqXHR, textStatus, errorThrown){
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
