$(document).ready(function () {
    $('.follow-button').on('click', function () {
        var user_id = $(this).data('user-id');
        var following = $(this).data('following');
        var $button = $(this);
        $.ajax({
            url: following ? '/unfollow/' + user_id : '/follow/' + user_id,
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.status === 'followed') {
                    $button.data('following', true);
                    $button.find('button').text('Unfollow');
                } else if (data.status === 'unfollowed') {
                    $button.data('following', false);
                    $button.find('button').text('Follow');
                } else if (data.status === 'not_following') {
                    // Handle case when user was not following the target user (optional)
                }
                $.get(location.href, function(data) {
                    $('#follow').html($(data).find('#follow').html());
                });
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });
});
