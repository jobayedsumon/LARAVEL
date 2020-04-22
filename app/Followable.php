<?php


namespace App;


use Illuminate\Support\Facades\Session;

trait Followable
{

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows',
            'user_id', 'following_user_id');
    }

    public function follow(User $user)
    {
        $this->follows()->save($user);

    }

    public function unfollow(User $user)
    {
        $this->follows()->detach($user);

    }

    public function following(User $user)
    {
        //
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);

    }
}
