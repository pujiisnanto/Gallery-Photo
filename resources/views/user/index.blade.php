@extends('layout.master')
@section('title', 'PicMe')
@section('content')

{{--
    'aliases' => Facade::defaultAliases()->merge([
        // ...
        'PDF' => Barryvdh\DomPDF\Facade::class,
        'Alert' => RealRashid\SweetAlert\Facades\Alert::class,

    ])->toArray(),
 --}}
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
            {{-- <button id="toggleBtn" data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button> --}}
        </div>
        <!-- responsif navbar -->
        {{-- <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
            </ul>
        </div> --}}
        <!-- end navbar -->
    </div>
</nav>

<section style="background-image: url('{{ asset('Assets/images/logo-home.png') }}')"  class="bg-center bg-no-repeat bg-gray-100 bg-blend-multiply bg-[url('{{ asset('Assets/images/logo-home.png') }}')] bg-cover">
    <div class="px-4 mx-auto max-w-screen-xl h-screen text-center py-24 lg:py-56">
        <h1 class="mb-2 text-md md:2xl font-semibold tracking-tight leading-none text-biru md:text-3xl lg:text-5xl">
            Tangkap Momen, Hidupkan Kenangan
        </h1>
        <h1 class="mb-4 text-sm font-semibold tracking-tight leading-none text-pink md:text-2xl lg:text-4xl">
            PicMe, Mengembalikan Kebahagian
        </h1>
        <div class="flex justify-center mb-8">
            <span class="flex w-3 h-3 me-3 bg-gray-200 rounded-full"></span>
            <span class="flex w-3 h-3 me-3 bg-gray-900 rounded-full dark:bg-gray-700"></span>
            <span class="flex w-3 h-3 me-3 bg-blue-600 rounded-full"></span>
            <span class="flex w-3 h-3 me-3 bg-green-500 rounded-full"></span>
            <span class="flex w-3 h-3 me-3 bg-red-500 rounded-full"></span>
            <span class="flex w-3 h-3 me-3 bg-purple-500 rounded-full"></span>
            <span class="flex w-3 h-3 me-3 bg-indigo-500 rounded-full"></span>
            <span class="flex w-3 h-3 me-3 bg-yellow-300 rounded-full"></span>
        </div>
        <p class="mb-8 text-sm md:text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48">
            PicMe adalah sebuah website gallery photo
        </p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="/jelajahi"
                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 border-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Jelajahi
            </a>
            <a href="#"
                class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                Learn more
            </a>
        </div>
    </div>
</section>

@endsection
