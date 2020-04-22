<div class="flex p-4 border-b border-b-gray-400 relative">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img width="50px" height="50px" src="{{ $tweet->user->avatar }}" alt=""
                 class="rounded-full mr-2">
        </a>

    </div>
    <div>
        <a href="{{ route('profile', $tweet->user) }}">
            <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>
        </a>
        <p class="text-sm mb-2">
            {{ $tweet->body }}
        </p>

        @if($tweet->image)
        <img src="{{ asset('storage/'.$tweet->image) }}" alt="Tweet Image">
        @endif

        <x-like-dislike-buttons :tweet="$tweet"></x-like-dislike-buttons>
    </div>

    @if(current_user()->is($tweet->user))
        <form method="POST" action="/tweets/{{ $tweet->id }}">
            @csrf
            @method('DELETE')
            <input type="hidden" value="{{ $tweet->id }}">
            <button class="fa fa-remove right-0 absolute"></button>
        </form>

    @endif


</div>
