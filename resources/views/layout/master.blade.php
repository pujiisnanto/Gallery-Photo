 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="UTF-8" />
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>@yield('title')</title>
     <link href="{{ asset('Assets/css/style.css') }}" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

     <link rel="stylesheet" href="{{ asset('Assets/css/build.css') }}">
     @stack('css')

     <style>
         .active {
             background-color: #D1D5DB;
         }
     </style>
 </head>

 <body>
     @yield('content')

     <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
     @include('sweetalert::alert')

     <div id="drawer-form"
         class="fixed top-0 left-0 z-50 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"
         tabindex="-1" aria-labelledby="drawer-form-label">
         <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
             Pencarian
        </h5>
         <button type="button" data-drawer-hide="drawer-form" aria-controls="drawer-form"
             class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
             <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 14 14">
                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
             </svg>
             <span class="sr-only">Close menu</span>
         </button>
         <form class="mb-6">
             <div class="mb-4">
                 <div class="relative">
                     <input type="search" id="guests"
                         class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         placeholder="Search" required autocomplete="off" autofocus/>
                </div>
             </div>
         </form>
         <div id="searchResults" class="grid gap-2">
            <div class="flex items-center border-2 justify-center bg-white dark:bg-gray-800 rounded-xl w-auto">
                <div class="flex items-center p-2 gap-2 w-auto">
                    <div class="lg:w-20 lg:h-20 w-10 h-10 md:w-16 md:h-16 rounded-full overflow-hidden border-2 shadow-xl">
                        <a href=""><img src="" alt="Profil-Pengguna" class="object-cover"></a>
                    </div>
                    <div class="flex text-white flex-col gap-2 w-auto">
                        <a href="" class="flex items-center flex-col">
                            <p class="md:text-md text-sm text-pink dark:text-gray-500 hover:text-blue-700">njsjd cd</p>
                            <p class="md:text-md text-sm text-biru dark:text-gray-500 hover:text-pink">hai</p>
                        </a>
                    </div>
                </div>
            </div>
        
            <div class="flex items-center border-2 justify-center bg-white dark:bg-gray-800 rounded-xl w-auto">
                <div class="flex items-center p-2 gap-2 w-auto">
                    <div class="lg:w-20 lg:h-20 w-10 h-10 md:w-16 md:h-16 rounded-full overflow-hidden border-2 shadow-xl">
                        <a href=""><img src="" alt="Profil-Pengguna" class="object-cover"></a>
                    </div>
                    <div class="flex text-white flex-col gap-2 w-auto">
                        <a href="" class="flex items-center flex-col">
                            <p class="md:text-md text-sm text-pink dark:text-gray-500 hover:text-blue-700">njsjd cd</p>
                            <p class="md:text-md text-sm text-biru dark:text-gray-500 hover:text-pink">hai</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex items-center border-2 justify-center bg-white dark:bg-gray-800 rounded-xl w-auto">
                <div class="flex items-center p-2 gap-2 w-auto">
                    <div class="lg:w-20 lg:h-20 w-10 h-10 md:w-16 md:h-16 rounded-full overflow-hidden border-2 shadow-xl">
                        <a href=""><img src="" alt="Profil-Pengguna" class="object-cover"></a>
                    </div>
                    <div class="flex text-white flex-col gap-2 w-auto">
                        <a href="" class="flex items-center flex-col">
                            <p class="md:text-md text-sm text-pink dark:text-gray-500 hover:text-blue-700">njsjd cd</p>
                            <p class="md:text-md text-sm text-biru dark:text-gray-500 hover:text-pink">hai</p>
                        </a>
                    </div>
                </div>
            </div>
        
            <!-- Add more items as needed -->
        </div>
        
        

     </div>
 </body>
 <script src="{{ asset('Assets/js/seach.js') }}"></script>
 <script>
     // JavaScript untuk menangani event klik pada menu
     const menuLinks = document.querySelectorAll('.menu-link');

     menuLinks.forEach(link => {
         link.addEventListener('click', function(event) {
             // Hapus kelas 'active' dari semua tautan
             menuLinks.forEach(menuLink => menuLink.classList.remove('active'));

             // Tambahkan kelas 'active' pada tautan yang diklik
             link.classList.add('active');
         });
     });
 </script>
 @stack('js')

 </html>
