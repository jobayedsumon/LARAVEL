<div class="flex items-center">

    <form method="POST" action="/tweets/{{ $tweet->id }}/like" >
        @csrf
        <div class="mr-4 {{ $tweet->isLikedBy(current_user()) ? 'text-blue-500' : 'text-gray-500' }}">
            <button type="submit" class="fa fa-thumbs-up"></button>
            <span class="text-xs">{{ $tweet->likes ?: 0 }}</span>
        </div>
    </form>


    <form method="POST" action="/tweets/{{ $tweet->id }}/like" >
        @csrf
        @method('DELETE')

        <div class="{{ $tweet->isDislikedBy(current_user()) ? 'text-blue-500' : 'text-gray-500' }}">
            <button type="submit" class="fa fa-thumbs-down"></button>
            <span class="text-xs">{{ $tweet->dislikes ?: 0 }}</span>
        </div>

    </form>

</div>
