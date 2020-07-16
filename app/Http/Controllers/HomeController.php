<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $channels = Channel::all();

        return view('home')->with('channels', $channels);
    }

    public function home()
    {
        $videos = Video::with('channel')->get();

        $channels = Channel::all();

        return view('welcome')->with('videos', $videos)->with('channels', $channels);
    }

    public function channelView(Channel $channel)
    {
        return view('channel')->with('channel', $channel);
    }
}
