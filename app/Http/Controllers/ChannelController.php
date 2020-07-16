<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Image;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function create()
    {
        return view('channels.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:channels,name|max:100',
            'description' => 'required',
            'image' => 'required',
        ]);
            
        $validatedData['user_id'] = auth()->user()->id;

        //get filename with extension
        $filenamewithextension = $request->file('image')->getClientOriginalName();
 
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('image')->getClientOriginalExtension();
 
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
 
        //Upload File
        $path = $request->file('image')->storeAs('public/images/channels', $filenametostore);
 
        //Resize image here
        $thumbnailpath = public_path('/images/channels/'.$filenametostore);
        $img = Image::make($request->file('image')->getRealPath())->resize(null,  250, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);
                
        $validatedData['image'] = str_replace('public', '', $path);

        Channel::create($validatedData);

        return redirect('home');
    }

    public function show(Channel $channel)
    {
        $videos = $channel->videos()->get();

        return view('channels.show', compact('channel', 'videos'));
    }

    public function update(Channel $channel)
    {
        if ($request->hasFile('image')) {
            $channel->clearMediaCollection('images');

            $channel->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }

        $channel->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->back();
    }
}
