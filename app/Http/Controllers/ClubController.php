<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ClubController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $clubs = Club::all();
        return view('clubs.index')->with('clubs',$clubs);
    }

    public function create()
    {
        return view('clubs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:20', 'responsable'=>'required|max:20', 'details'=>'required|max:416', 'hero'=>'required|mimes:jpg,png,jpeg|max:2048'
        ]);

        $hero = $request->hero;
        $newHero = time().$hero->getClientOriginalName();
        $hero->move('uploads/clubs',$newHero);

        $club = Club::create([
            'name'=>$request->name, 
            'responsable'=>$request->responsable, 
            'details'=>$request->details, 
            'hero' => 'uploads/clubs/'.$newHero
        ]);
        return redirect()->back();
    }

    public function show(Club $club)
    {
        //
    }

    public function edit($id)
    {
        $clubs = Club::where('id', $id)->first();
        return view('clubs.edit')->with('clubs',$clubs);
    }

    public function update(Request $request, $id)
    {
        $clubs = Club::where('id', $id)->first();
        $this->validate($request, [
            'name'=>'required|max:20', 'responsable'=>'required|max:20', 'details'=>'required|max:416', 'hero'=>'mimes:jpg,png,jpeg|max:2048'

        ]);

        if ($request->has('hero')) {
            if (File::exists(public_path($clubs->hero))) {
                File::delete(public_path($clubs->hero));
            }
            
            $hero = $request->hero;
            $newHero = time().$hero->getClientOriginalName();
            $hero->move('uploads/clubs',$newHero);
            $clubs->hero='uploads/clubs/'.$newHero;
            $clubs->save();
        }
       

        $clubs->name  = $request->name;
        $clubs->responsable  = $request->responsable;
        $clubs->details  = $request->details;
        $clubs->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $club = Club::where('id', $id)->first();
        File::delete(public_path($club->hero));
        $club->forceDelete();
        return redirect()->back();
    }
}
