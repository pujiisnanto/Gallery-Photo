@extends('layout.master')
@section('title', 'PicMe | Jelajahi')
@section('content')
@include('user-admin.layout.header')
@include('user-admin.layout.sidebar')
   <div class="p-4 sm:ml-64">
      <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
          <div class="flex items-center justify-center h-32 md:h-32 lg:h-36 mb-4 rounded-xl bg-gray-50 dark:bg-gray-800 overflow-hidden">
               <img src="{{ asset('Assets/images/5.jpg') }}" alt="" class="w-full">
          </div>

          <div class="flex gap-1 border-2 justify-start border-gray-50 overflow-x-auto overflow-y-hidden p-2">
               <div class="flex w-full gap-2 p-1 mx-auto my-2 rounded-lg dark:bg-gray-600" >
                 <button type="button" class="border-2 px-5 py-1.5 bg-gray-200 text-xs font-medium text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700 rounded-lg">Semua</button>
               </div>
            @foreach ($kategori as $kategoris)
                <div class="flex w-full gap-2 p-1 mx-auto my-2 rounded-lg dark:bg-gray-600" >
                    <button type="button" class="border-2 px-5 py-1.5 bg-gray-200 text-xs font-medium text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700 rounded-lg">{{ $kategoris->nama }}</button>
                </div>
            @endforeach


          </div>
         <div class="my-4 w-full">
            <form class="flex items-center">
               <div class="relative w-full">
                  <input type="text" id="pencarian"
                     class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  py-2.5 px-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     placeholder="Search" required />
               </div>
            </form>
         </div>
          <hr class="bg-biru mb-4">
          <div id="exploreData" class="gap-2 columns-2 md:columns-3 lg:columns-4">

          </div>
      </div>
   </div>
@endsection

@push('js')
    <script>
let pencarian = '';
let paginate = 1;
let dataExplore = [];
loadMoreData(paginate);

$(document).ready(function() {
    var delayTimer;

    $('#pencarian').on('keyup', function() {
        clearTimeout(delayTimer);
        delayTimer = setTimeout(function() {
            pencarian = $('#pencarian').val();
            cariData();
        }, 500);
    });
});

function cariData(){
    $.ajax({
        url: '/cariData',
        type: "GET",
        data: {data: pencarian},
        dataType: "JSON",
        success: function(respon){
            dataExplore = respon.datas.data; // Mengganti dataExplore dengan data baru dari server
            $('#exploreData').empty();
            if (dataExplore.length > 0) {
                getExplore();
            } else {
                $('#exploreData').append('<div class="text-center text-gray-500">No results found.</div>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching data:', errorThrown);
            // Tangani kesalahan
        }
    });
}

$(window).scroll(function(){
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        paginate++;
        loadMoreData(paginate);
    }
});

function loadMoreData(paginate) {
    console.log(pencarian);
    $.ajax({
        url: '/getExplore' + '?page=' + paginate,
        type: "GET",
        // data: {data: pencarian},
        dataType: "JSON",
        success: function (response) {
            let newData = response.data.data;
            dataExplore = dataExplore.concat(newData);
            console.log(dataExplore);
            getExplore();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching data:', errorThrown);
            // Handle error
        }
    });
}

const getExplore = () => {
    $('#exploreData').html('');
    dataExplore.forEach((x, i) => {
        $('#exploreData').append(
            `<div class="mb-2 overflow-hidden cursor-pointer">
                <a href="/detail/${x.id}">
                    <img class="h-auto w-full rounded-lg object-cover cursor-zoom-in transition ease-in-out scale-100 hover:scale-110" src="Assets/images/Postingan/${x.name}" alt="${x.judul}"/>
                </a>
            </div>`
        );
    });
};

    </script>
@endpush
</html>
