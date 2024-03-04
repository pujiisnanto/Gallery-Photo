$(document).ready(function () {
    $('.like-button').on('click', function () {
        var $button = $(this); // Simpan referensi elemen .like-button

        var postinganId = $button.data('postingan-id');
        var liked = $button.data('liked');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: liked ? '/dislike/' + postinganId : '/like/' + postinganId,
            type: 'POST',
            success: function (data) {
                if (liked) {
                    // Handle dislike success
                    $button.data('liked', false);
                    $button.find('button').removeClass('bi-heart-fill').addClass('bi-heart');
                } else {
                    // Handle like success
                    $button.data('liked', true);
                    $button.find('button').removeClass('bi-heart').addClass('bi-heart-fill');
                }
                $.get(location.href, function(data) {
                    $('#CountLike').html($(data).find('#CountLike').html());
                    $('#likeTooltip').html($(data).find('#likeTooltip').html());
                });

            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log('server error');
            }
        });
    });
});
