$(document).ready(function () {

        var count = 0;
        const maxChars = 255;

    $('#tweetBody').on('keyup', function (event) {

        count = $('#tweetBody').val().length;

        if(count < 0)
            count = 0;

        if(count >= maxChars)
            count = maxChars;

        $('#charRemains').text('Remaining characters ' + (maxChars - count));

    });

    function likeMethod(tweetId) {
        $.post('/tweets/'+tweetId+'/like', {
            'tweet': tweetId,
            '_token': $('#_token').val()
        }, function (data) {
            $('body').html(data);
        });
    }

    function dislikeMethod(tweetId) {
        $.ajax({
           url:  '/tweets/'+tweetId+'/like',
            type: 'POST',
            data: {
                'tweet': tweetId,
                '_token': $('#_token').val(),
                '_method': 'DELETE'
            },
            success: function (data) {
                $('body').html(data);
            }
        });
    }

});

