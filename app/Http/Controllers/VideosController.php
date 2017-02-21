<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideosController extends Controller
{
    public function index(){
    	$videos = Video::all();
    	return view('video.index', compact('videos'));
    }


    public function create(){

    }

    public function edit(){

    }

    public function destroy(){

    }
}
