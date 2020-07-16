<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return 'index';
    }

    public function create(Channel $channel)
    {
        $channelId = $channel->id;
        return view('videos.create', compact('channelId'));
    }

    public function store(Channel $channel, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:videos,title|max:100',
            'description' => 'required',
            'video' => 'required',
        ]);

        //get filename with extension
        $filenamewithextension = $request->file('video')->getClientOriginalName();
 
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('video')->getClientOriginalExtension();
 
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;

        $validatedData['type'] = $request->file('video')->getMimeType();
        
        $path = $request->video->storeAs("public/videos/{$channel->id}", $filenametostore);

        $validatedData['channel_id'] = $channel->id;
        $validatedData['path'] = str_replace('public', '', $path);

        
        Video::create($validatedData);

        return redirect("channels/$channel->id");
    }
}
