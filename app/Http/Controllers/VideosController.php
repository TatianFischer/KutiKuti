<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Video;

class VideosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$videos = Video::all();
    	return view('video.index', compact('videos'));
    }


    public function create(){
        return view('video.create');
    }

    public function store(Request $request){

        $video = new Video();

        $this->validate($request, [
            'title' => 'required',
            'step' => 'required',
            'tag' => 'required',
            'slug' => 'required',
            'poster' => 'required|image|dimensions:min_width=50,min_height=50',
        ]);

        $video->title = $request->title;
        $video->step = $request->step;
        $video->tag = $request->tag;
        $video->slug = $request->slug;
        if($request->hasFile('poster')){
            $file = Input::file('poster');

            $name = $file->getClientOriginalName();
            $video->poster = $name;
            $file->move(public_path().'/img/posters',$name);
        }

        $video->save();
        
        return $this->create()->with('success', 'Video ajoutée avec succès'); 
    }

    public function edit(Video $video){
        return view('video.edit', compact('video'));
    }

    public function update(Request $request, Video $video){
        $this->validate($request, [
            'title' => 'required',
            'step' => 'required',
            'tag' => 'required',
            'slug' => 'required',
            'poster' => 'image|dimensions:min_width=50,min_height=50',
        ]);

        $video->title = $request->title;
        $video->step = $request->step;
        $video->tag = $request->tag;
        $video->slug = $request->slug;

        $last_poster_name = $video->poster;

        if($request->hasFile('poster')){
            $file = Input::file('poster');
            unlink(public_path().'/img/posters/'.$last_poster_name);

            $name = $file->getClientOriginalName();
            $video->poster = $name;
            $file->move(public_path().'/img/posters',$name);
        }

        $video->update();
        session()->flash('success', 'Video modifiée avec succès');
        return redirect()->route("videos.index");
    }

    public function destroy(Video $video){
        $poster_name = $video->poster;
        $video->delete();
        unlink(public_path().'/img/posters/'.$poster_name);
        return back()->with('success', 'Video supprimée avec succès');
    }
}
