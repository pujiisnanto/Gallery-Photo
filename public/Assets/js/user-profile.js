// JavaScript
let paginate = 1;
let dataExplore = [];
let exploreElemen = document.querySelector(`[data-user]`);
let userId = exploreElemen.getAttribute("data-user");

loadMoreData(paginate);
$(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        paginate++;
        loadMoreData(paginate);
    }
});

function loadMoreData(paginate) {
    $.ajax({
        url: '/getProfileUser/' + userId + '?page=' + paginate, // Perbaiki URL
        type: "GET",
        dataType: "JSON",
        success: function(response) {
            let newData = response.data.data;
            dataExplore = dataExplore.concat(newData);
            console.log(dataExplore);
            getExplore(); // Panggil fungsi getExplore setelah memuat data baru
        },
        error: function(jqXHR, textStatus, errorThrown) {}
    });
}

const getExplore = () => {
    $('#exploreData').html(''); // Perbaiki pemilihan elemen dengan menambahkan '#' sebelum 'exploreData'
    dataExplore.map((x, i) => {
        $('#exploreData').append(
            `<div class="mb-2 overflow-hidden cursor-pointer">
                <a href="/details/${x.id}">
                    <img class="h-auto w-full rounded-lg object-cover cursor-zoom-in transition ease-in-out scale-100 hover:scale-110" src="Assets/images/Postingan/${x.name}" alt="${x.judul}"/>
                </a>
            </div>`
        );
    });
};
