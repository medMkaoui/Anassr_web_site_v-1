<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partenaire = Partenaire:: all();
        return view('partenaires.index')->with('partenaire', $partenaire);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partenaires.create');
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
            'logo' =>'required',
            'name' =>'required',
            'url'  =>'required'
        ]);

        $logo = $request->logo;
        $newLogo = time().$logo->getClientOriginalName();
        $logo->move('uploads/partenaire',$newLogo);

        $partenaire = Partenaire::create([
            'logo' => 'uploads/partenaire/'.$newLogo,
            'name' => $request->name,
            'url'  => $request->url,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $partenaire = Partenaire::where('id', $id)->first();
        return view('partenaires.show')->with('partenaire',$partenaire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partenaire = Partenaire::where('id', $id)->first();
        return view('partenaires.edit')->with('partenaire',$partenaire);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $partenaire = Partenaire::where('id', $id)->first();
        $this->validate($request,[
            'name' =>'required',
            'url'  =>'required'
        ]);


        if ($request->has('logo')) {
            if (File::exists(public_path($partenaire->logo)))
            {
                File::delete(public_path($partenaire->logo));
            }
            $logo = $request->logo;
            $newLogo = time().$logo->getClientOriginalName();
            $logo->move('uploads/partenaire',$newLogo);
            $partenaire->logo='uploads/partenaire/'.$newLogo;
            $partenaire->save();
        }

        $partenaire->name = $request->name;
        $partenaire->url = $request->url;
        $partenaire->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partenaire = Partenaire::where('id', $id)->first();

        if (File::exists(public_path($partenaire->logo))) {
            File::delete(public_path($partenaire->logo));
        }
        $partenaire->forceDelete();
        return redirect()->back();
    }
}
