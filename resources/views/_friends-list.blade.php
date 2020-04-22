<div class="border border-gray-300 rounded rounded-lg bg-gray-200 px-6 py-4">

<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>

    @forelse(current_user()->follows as $user)
    <li class="{{ $loop->last ?: 'mb-4' }}">
        <div>
            <a href="{{ route('profile', $user) }}"
               class="flex items-center text-sm">
                <img width="50px" height="50px" src="{{ $user->avatar }}" alt=""
                     class="rounded-full mr-2">
                {{ $user->name }}
            </a>
        </div>
    </li>

    @empty
        <li>No friends yet!</li>
    @endforelse
</ul>

</div>

@if (session('message'))
    <div class="absolute bottom-0 text-green-600 font-bold text-md-center">
        {{ session('message') }}
    </div>
@endif

