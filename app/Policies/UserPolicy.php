<?php

namespace App\Policies;

use App\Tweet;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function edit(User $currentUser, User $user)
    {
        return $currentUser->is($user);
    }

    public function delete(User $currentUser, Tweet $tweet)
    {
        return $currentUser->tweets()->has($tweet);
    }
}
