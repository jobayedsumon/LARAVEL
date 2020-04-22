

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

