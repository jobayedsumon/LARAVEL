<x-app>

    <div class="relative">
        <img src="{{ $user->cover }}"
             class="rounded-lg mb-2" alt="">

        <img width="150px" src="{{ $user->avatar }}" alt=""
             class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
        style="left: 50%">
    </div>

    <div class="flex justify-between items-center mb-6">
        <div style="max-width: 270px">
            <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
            <p class="text-sm">{{ $user->created_at->diffForHumans() }}</p>
        </div>


        <div class="flex">
            @if(current_user()->is($user))
                <a href="{{ $user->path('edit') }}" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs"
                   type="submit">Edit Profiles</a>
            @endif
            <x-follow-button :user="$user"></x-follow-button>
        </div>

    </div>

    <p class="text-sm mb-6">{{ $user->description ?: 'No description available!' }}</p>


    @include('_timeline', ['tweets' => $tweets])

</x-app>
