@extends('layout.master')
@section('title', 'PicMe | Proifle')
@section('content')
@include('user-admin.layout.header')
@include('user-admin.layout.sidebar')
    <div class="p-4 sm:ml-64">
      <div class="p-4 border-2 border-gray-200  border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="flex mb-4">
            <div class="flex justify-center w-full h-full rounded-lg dark:bg-gray-800 border-gray-200 border-2">
              <div class="p-4 flex flex-col justify-center items-center">
                 <div class="w-32 h-32 overflow-hidden rounded-full bg-biru items-center">
                      <img src="{{ asset('Assets/images/user-profile/'.$user->avatar) }}" alt="" class="object-cover">
                 </div>
                 <p class="text-pink mt-1">{{ \Illuminate\Support\str::limit($user->username, $limit = 15, $end = '...') }}</p>
                 <a href=""><p class="text-biru">{{ $user->email }}</p></a>
                 <div class="flex justify-between gap-2 py-2">
                      <a class="flex-col px-3" href="">
                           <p class="text-center hover:text-pink">{{ $follower }}</p>
                           <p class="text-center hover:text-biru">Pengikut</p>
                      </a>
                      <a class="flex-col px-3" href="">
                           <p class="text-center hover:text-pink">{{ $following }}</p>
                           <p class="text-center hover:text-biru">Mengikuti</p>
                      </a>
                      <a class="flex-col px-3" href="">
                           <p class="text-center hover:text-pink">{{ $postingan->count() }}</p>
                           <p class="text-center hover:text-biru">Postingan</p>
                      </a>
                 </div>
                 <p class="flex text-gray-500 align-center" style="text-align: center;">
                  {{ $user->bio }}
                 </p>
                {{-- <div id="follow" class="follow-button" data-user-id="{{ $detail->user_id }}" data-following="{{ $isFollowing ? 'true' : 'false' }}">
                   @csrf
                    <button type="button" class="text-sm text-biru">
                        {{ $isFollowing ? 'Unfollow' : 'Follow' }}
                    </button>
                </div> --}}
              </div>
            </div>
          </div>
        <hr class="bg-biru my-2"/>
        <div class="gap-2 columns-2 md:columns-3 lg:columns-4" data-user= {{ $user->id }}>
            @foreach ($postingan as $postingans)
            <div class="mb-2 overflow-hidden cursor-pointer">
                <a href="/details/.{{ $postingans->id }}">
                    <img class="h-auto w-full rounded-lg object-cover cursor-zoom-in transition ease-in-out scale-100 hover:scale-110" src="{{ asset('Assets/images/Postingan/' . $postingans->name) }}" alt="{{ $postingans->judul }}}"/>
                </a>
            </div>
            @endforeach
        </div>
      </div>
    </div>
@endsection

@push('js')
    {{-- <script src="{{ asset('Assets/js/user-profile.js') }}"></script> --}}
@endpush
