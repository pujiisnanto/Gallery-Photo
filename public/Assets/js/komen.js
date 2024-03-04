// JavaScript
$(document).ready(function(){
    $('#formKomentar').submit(function(e){
        e.preventDefault();
        let commentText = $('#commentText').val();
        let postinganId = $('input[name="postinganId"]').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/upload-Komentar',
            type: 'POST',
            data: {
                komentar: commentText,
                postinganId: postinganId
            },
            success: function(response) {
                if(response.status === 'success') {
                    $('#commentText').val('');
                    $.get(location.href, function(data) {
                        $('#exploreKomentar').html($(data).find('#exploreKomentar').html());
                    });
                    // loadMoreData(paginate); // Assuming you have a function to load more comments
                } else {
                    console.error('Error:', response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log('Server error');
            }
        });
    });
});
