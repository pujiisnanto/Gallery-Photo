// JavaScript (jQuery)
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

let paginate = 1;
let dataExplore = [];

loadMoreData(paginate);
    let exploreKomentar = $('#exploreKomentar');
    let exploreKomentarHeight = exploreKomentar.height();
    let exploreKomentarOffset = exploreKomentar.offset().top;

    if ($(window).scrollTop() + $(window).height() >= exploreKomentarHeight + exploreKomentarOffset) {
        paginate++;
        loadMoreData(paginate);
    }

function loadMoreData(paginate) {
    let data = document.querySelector('[data-postingan]');
    let dataPostingan = data.getAttribute('data-postingan');

    $.ajax({
        url: '/getDataKomentar/' + dataPostingan + '?page=' + paginate,
        type: 'GET',
        dataType: 'JSON',
        success: function(response) {
            let newData = response.data.data;
            dataExplore = dataExplore.concat(newData);
            getkomentar();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error loading more data:', textStatus, errorThrown);
        }
    });
}

const getkomentar = () => {
    $('#exploreKomentar').html('');
    dataExplore.map((x, i) => {
        $('#exploreKomentar').append(
            `<div class="flex flex-row justify-start gap-2 py-2">
                <div class="w-10 h-10 overflow-hidden rounded-full border-2 hover:border-blue-500 cursor-pointer">
                    <img alt="${x.user.avatar}" src="Assets/images/user-profile/${x.user.avatar}" class="w-10 h-10 object-cover rounded-full" alt="">
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-col h-6">
                        <h5 class="flex items-center text-sm">${x.user.username}</h5>
                    </div>
                    <div class="border-2 border-dashed p-2 rounded-xl">
                        <h5 class="text-sm">${x.isi_komentar}</h5>
                    </div>
                </div>
            </div>`
        );
    });
};
