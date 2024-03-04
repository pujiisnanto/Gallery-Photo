let paginate = 1;
let dataExplore = [];

loadMoreData(paginate);
$(window).scroll(function(){
     if($(window).scrollTop() + $(window).height() >= $(document).height()){
          paginate++;
          loadMoreData(paginate);
     }
})

function loadMoreData(paginate){
     $.ajax({
        url: '/explore-plus-postingan' +'?page=' +paginate,
        type: "GET",
        dataType: "JSON",
        success: function (response) {
            // Mengasumsikan 'data' adalah kunci yang berisi hasil paginasi
            let newData = response.data.data; // Sesuaikan dengan struktur data sebenarnya

            // Menambahkan data baru ke dalam array dataExplore yang sudah ada
            dataExplore = dataExplore.concat(newData);

            // Anda dapat menangani data baru sesuai kebutuhan, misalnya, memperbarui antarmuka pengguna (UI)
            console.log(dataExplore);
            getExplore(); // Panggil fungsi getExplore setelah memuat data baru
        },
          error: function(jqXHR, textStatus, errorThrown){

          }
     })
}

const getExplore = () => {
    $('#exploreData').html(''); // Perbaiki pemilihan elemen dengan menambahkan '#' sebelum 'exploreData'
    dataExplore.map((x, i) => {
        $('#exploreData').append(
            `<div class="mb-2 overflow-hidden cursor-pointer">
                <a href="/detail/${x.id}">
                    <img class="h-auto w-full rounded-lg object-cover cursor-zoom-in transition ease-in-out scale-100 hover:scale-110" src="Assets/images/Postingan/${x.name}" alt="${x.judul}"/>
                </a>
            </div>`
        );
    });
};
