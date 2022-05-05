<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Projet;
use App\Models\Photo;
use App\Models\Videos;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
class ActiviteController extends Controller
{
    public function index()
    {
        $activite = Activite::all();
        return view('activites.index')->with('activite', $activite);
    }
    

    public function create()
    {
        $projets = Projet::all();
        return view('activites.create')->with('projets', $projets);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'           => 'required',
            'id_proj'        => 'required',
            'detail'         => 'required',
            'responsable'    => 'required',
            'type'           => 'required',
            'encadreur'      => 'required',
            'lieu'           => 'required',
            'date_debut'     => 'required',
            'date_fin'       => 'required',
            'dure'           => 'required',
        ]);


        $activite = Activite::create([

            'name'        =>$request->name,
            'id_proj'     =>$request->id_proj,
            'detail'      =>$request->detail,
            'responsable' =>$request->responsable,
            'type'        =>$request->type,
            'encadreur'   =>$request->encadreur,
            'lieu'        =>$request->lieu,
            'date_debut'  =>$request->date_debut,
            'date_fin'    =>$request->date_fin,
            'dure'        =>$request->dure
        ]);
        $activite = Activite::latest()->first();
        foreach ($request->video as $item) {
           
            $video=Videos::create([
                'id_activite'=>$activite->id,
                'id_proj'=>0,
                'URL'=>$item
            ]);
        }
        foreach ($request->photo as $item) {
            $photo=$item;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/activites',$newPhoto);
            $photo=Photo::create([
                'id_activite'=>$activite->id,
                'id_proj'=>0,
                'URL'=>'uploads/activites/'.$newPhoto
            ]);
        }
        return redirect()->back();
    }

    public function show( $id)
    {
        $activite = Activite::where('id', $id)->first();
        // dd($activite->video->first()->URL);
        return view('activites.show')->with('activite', $activite);
    }

    public function edit( $id)
    {
        $projets = Projet::all();
        $activite = Activite::where('id', $id)->first();
        return view('activites.edit')->with('activite',$activite)->with('projets', $projets);
    }


    public function update(Request $request, $id)
    {
        $activite = Activite::where('id', $id)->first();
        $this->validate($request, [
            'name'        => 'required',
            'id_proj'     => 'required',
            'detail'      => 'required',
            'responsable' => 'required',
            'type'        => 'required',
            'encadreur'   => 'required',
            'lieu'        => 'required',
            'date_debut'  => 'required',
            'date_fin'    => 'required',
            'dure'        => 'required',
        ]);

        if ($request->has('photo')) {
            foreach ($activite->photo as $item) {
                if (File::exists(public_path($item->URL))) {
                    File::delete(public_path($item->URL));
                }
                $item->forceDelete();
            }
            foreach ($request->photo as $item) {
                $newPhoto = time().$item->getClientOriginalName();
                $item->move('uploads/activites',$newPhoto);
                $item->URL = 'uploads/activites/'.$newPhoto;
                $item=Photo::create([
                    'id_activite'=>$activite->id,
                    'id_proj'=>0,
                    'URL'=>'uploads/activites/'.$newPhoto
                ]);
                
            }
        }

        

        $activite->name         = $request->name;
        $activite->id_proj      = $request->id_proj;
        $activite->detail       = $request->detail;
        $activite->responsable  = $request->responsable;
        $activite->type         = $request->type;
        $activite->encadreur    = $request->encadreur;
        $activite->lieu         = $request->lieu;
        $activite->date_debut   = $request->date_debut;
        $activite->date_fin     = $request->date_fin;
        $activite->dure         = $request->dure;
        $activite->save();
        return redirect()->back();
    }

    public function destroy( $id)
    {
        $activite = Activite::where('id', $id)->first();
        foreach ($activite->photo as $item) {
            if (File::exists(public_path($item->URL))) {
                File::delete(public_path($item->URL));
                // dd(public_path($item->URL));
            }
            $item->forceDelete();
        }
        $activite->forceDelete();
        return redirect()->back();
    }
}
