@unless(current_user()->is($user))

<form method="POST" action="{{ route('follow', $user->username) }}">
    @csrf
    <button class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs"
            type="submit">
        {{ current_user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
    </button>
</form>

@endunless


