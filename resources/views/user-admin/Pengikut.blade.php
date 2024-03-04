@extends('layout.master')
@section('title', 'PicMe | Pengikut')
@section('content')
@include('user-admin.layout.header')
@include('user-admin.layout.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <!-- content user follow -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($follow as $follows)
                    <div class="flex border-2 justify-center bg-white  dark:bg-gray-800 rounded-xl w-auto">
                        <div class="block items-center p-2 gap-2">
                            <div class="flex justify-center">
                                <div class="felx w-20 h-20 rounded-full overflow-hidden border-2 shadow-xl">
                                    <img src="{{ asset('Assets/images/user-profile/' . $follows->user->avatar) }}" alt="User-Profile"
                                        class="object-cover">
                                </div>
                            </div>
                            <div class="flex text-white flex-col gap-2 justify-center">
                                <p class="text-md text-pink dark:text-gray-500 text-center">{{ \Illuminate\Support\str::limit($follows->user->username, $limit = 10, $end = '...') }}</p>
                                <button type="submit" name="user_id" class="bg-blue-700 px -1 py-1 rounded-lg text-sm" onclick="">Follow</button>
                            </div>
                        </div>
                    </div>
                @endforeach

           </div>
           <!-- end content user follow -->
        </div>
     </div>
@endsection

