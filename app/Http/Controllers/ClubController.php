<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::all();
        return view('clubs.index')->with('clubs',$clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required', 'responsable'=>'required', 'details'=>'required', 'hero'=>'required'
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clubs = Club::where('id', $id)->first();
        return view('clubs.edit')->with('clubs',$clubs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clubs = Club::where('id', $id)->first();
        $this->validate($request, [
            'name'=>'required', 'responsable'=>'required', 'details'=>'required', 'hero'=>'required'

        ]);

        if ($request->has('hero')) {
            // dd($request->hero->getClientOriginalName());
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = Club::where('id', $id)->first();
        File::delete(public_path($club->hero));
        $club->forceDelete();
        return redirect()->back();
    }
}
