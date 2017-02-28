<?php

namespace App\Http\Controllers;
use App\Video;

class TutosController extends Controller
{
    public function index(){
    	$videos = Video::all();
    	return view('tutos', compact('videos'));
    }

    public function show($id, $slug) {
    	$video = Video::find($id);
    	return view('tutos_video', compact('video'));
    }
}

