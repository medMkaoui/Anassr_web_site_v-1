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

    public function __construct(){
        $this->middleware('auth');
    }

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
        if ($request->has('photo')) {
            if (count($request->photo)>5) {
                return redirect()->back()->withErrors("maximum files is 5");
            }
        }
        

        $this->validate($request, [
            'name'           => 'required|string|max:15',
            'detail'         => 'required|string|max:820',
            'responsable'    => 'required|string|max:20',
            'type'           => 'required|string|max:20',
            'encadreur'   => $request->type === 'Formation' ? 'required': 'nullable',
            'lieu'           => 'required|string|max:20',
            'date_debut'     => 'required|before:date_fin',
            'photo.*'        => 'required|max:2048',
            'date_fin'       => 'required',
        ]);

        
        $idProj = 0;
        if ($request->has('id_proj')) {
            $idProj = $request->id_proj;

        }

        $activite = Activite::create([

            'name'        =>$request->name,
            'id_proj'     =>$idProj,
            'detail'      =>$request->detail,
            'responsable' =>$request->responsable,
            'type'        =>$request->type,
            'lieu'        =>$request->lieu,
            'date_debut'  =>$request->date_debut,
            'date_fin'    =>$request->date_fin
        ]);
        $activite = Activite::latest()->first();
        if ($request->has('video')) {
            
            foreach ($request->video as $item) {
                if ($item!="") {
                    $video= Videos::create([
                        'id_activite'=>$activite->id,
                        'id_proj'=>0,
                        'URL'=>$item
                    ]);
                }
            }
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
        if ($request->has('photo')) {
            if (count($request->photo)>5) {
                return redirect()->back()->withErrors("maximum files is 5");
            }
        }
        
        $this->validate($request, [
            'name'        => 'required|string|max:15',
            'detail'      => 'required|string|max:820',
            'responsable' => 'required|string',
            'type'        => 'required|string|max:20',
            'encadreur'   => $request->type === 'Formation' ? 'required': 'nullable',
            'photo.*'     => 'mimes:jpg,png,jpeg|max:2048',
            'lieu'        => 'required|string|max:20',
            'date_debut'  => 'required|before:date_fin',
            'date_fin'    => 'required',
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

        if ($request->has('video')) {
            foreach ($activite->video as $item) {
                $item->forceDelete();
            }
            foreach ($request->video as $item) {
                if($item!=""){
                    $video= Videos::create([
                    'id_proj'=>0,
                    'id_activite'=>$activite->id,
                    'URL'=>$item
                    ]);
                }
            }
        } 
        

        $activite->name         = $request->name;
        $activite->id_proj      = $request->id_proj;
        $activite->detail       = $request->detail;
        $activite->responsable  = $request->responsable;
        $activite->type         = $request->type;
        if ($request->type =="Formation") {
          $activite->encadreur    = $request->encadreur;
        } else{
            $activite->encadreur    =null;
        }
        $activite->lieu         = $request->lieu;
        $activite->date_debut   = $request->date_debut;
        $activite->date_fin     = $request->date_fin;
        $activite->save();
        return redirect()->back();
    }

    public function destroy( $id)
    {
        $activite = Activite::where('id', $id)->first();
        foreach ($activite->photo as $item) {
            if (File::exists(public_path($item->URL))) {
                File::delete(public_path($item->URL));
            }
            $item->forceDelete();
        }
        $activite->forceDelete();
        return redirect()->back();
    }
}
