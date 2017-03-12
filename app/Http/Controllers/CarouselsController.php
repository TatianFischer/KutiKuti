<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Carousel;

class CarouselsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('accueil');
    }

    public function accueil(){
    	$carousels = Carousel::all();
    	return view('accueil', compact('carousels'));
    }


    public function index(){
    	$carousels = Carousel::all();
    	return view('carousel.index', compact('carousels'));
    }

    public function create(){
        return view('carousel.create');
    }

    public function store(Request $request, carousel $carousel){
    	//dd($request);

        $this->validate($request, [
            'alternative' => 'required|string',
            'text' => 'nullable|string',
            'position_horizontal' => 'nullable|in:"left","center","right"',
            'position_vertical' => 'nullable|in:"top","middle","bottom"',
            'picture' => 'required|image',
        ]);

        $carousel->alternative = $request->alternative;
        $carousel->text = $request->text;
        $carousel->position_horizontal = $request->position_horizontal;
        $carousel->position_vertical = $request->position_vertical;
        if($request->hasFile('picture')){
            $file = Input::file('picture');

            $extension = $file->getClientOriginalExtension();
            $name = 'carousel'.time().'.'.$extension;
            $carousel->picture = $name;
            $file->move(public_path().'/img/carousel',$name);
        }

        $carousel->save();
        
        return $this->create()->with('success', 'Slide ajouté avec succès'); 
    }

    public function edit(Carousel $carousel){
    	// dd($carousel);
        return view('carousel.edit', compact('carousel'));
    }

    public function update(Request $request, carousel $carousel){
        $this->validate($request, [
            'alternative' => 'required|string',
            'text' => 'nullable|string',
            'position_horizontal' => 'nullable|in:"left","center","right"',
            'position_vertical' => 'nullable|in:"top","middle","bottom"',
            'picture' => 'image',
        ]);

        $carousel->alternative = $request->alternative;
        $carousel->text = $request->text;
        $carousel->position_horizontal = $request->position_horizontal;
        $carousel->position_vertical = $request->position_vertical;

        $last_photo_name = $carousel->picture;

        if($request->hasFile('picture')){
            $file = Input::file('picture');
            unlink(public_path().'/img/carousel/'.$last_photo_name);

            $extension = $file->getClientOriginalExtension();
            $name = 'carousel'.time().'.'.$extension;
            $carousel->picture = $name;
            $file->move(public_path().'/img/carousel',$name);
        }

        $carousel->update();
        session()->flash('success', 'Slide modifié avec succès');
        return redirect()->route("carousel.index");
    }

    public function destroy(carousel $carousel){
        $carousel_name = $carousel->picture;
        $carousel->delete();
        unlink(public_path().'/img/carousel/'.$carousel_name);
        return back()->with('success', 'Slide supprimé avec succès');
    }
}
