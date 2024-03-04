let paginate = 1;
let dataExplore = [];
let values = '';
loadMoreData(paginate);
$(window).scroll(function(){
     if($(window).scrollTop() + $(window).height() >= $(document).height()){
          paginate++;
          loadMoreData(paginate);
     }
});

function loadMoreData(paginate){
    var urlnya = window.location.href.split("?");
    var parameter = new URLSearchParams(urlnya);
    var carivalue = parameter.get('cari');
    if(carivalue == null){
        url = '/getDataExplore/' +'?page=' +paginate;
    } else {
        url = '/getDataExplore?cari=' + carivalue + '&page=' +paginate;
    }

     $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function (response) {
            let newData = response.data.data;
            dataExplore = dataExplore.concat(newData);
            console.log(dataExplore);
            getExplore();
        },
          error: function(jqXHR, textStatus, errorThrown){

          }
     })
}

const getExplore = () => {
    $('#exploreData').html('');
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


