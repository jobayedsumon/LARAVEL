<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    //
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {
        $attributes = \request()->validate([
            'body' => 'required|max:255',
            'image' => 'file',
        ]);

        if(\request('image')) {
            $attributes['image'] = \request('image')->store('tweets');
        } else {
            $attributes['image'] = null;
        }


        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
            'image' => $attributes['image']
        ]);

        return redirect()->route('home')->with('message', 'Your tweet has been published!');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return back()->with('message', 'Your tweet has been deleted!');
    }
}
