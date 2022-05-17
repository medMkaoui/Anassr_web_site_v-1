<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Photo;
use App\Models\Videos;
use App\Models\Partenaire;
use App\Models\Projet_partenaires;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProjetController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $projet = Projet::all();
        return view('projets.index')->with('projet', $projet);
    }

    public function create()
    {
        $partenairs = Partenaire::all();
        return view('projets.create')->with("partenairs",$partenairs);
    }

    public function store(Request $request)
    {
        if (count($request->photo)>5) {
            return redirect()->back()->withErrors("maximum files is 5");
        }
        $this->validate($request, [
            'name'        => 'required',
            'detail'      => 'required',
            'responsable' => 'required',
            'type'        => 'required',
            'lieu'        => 'required',
            'date_debut'  => 'required',
            'date_fin'    => 'required',
            'photo.*'       => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        $projet = Projet::create([

            'name'        =>$request->name,
            'detail'      =>$request->detail,
            'responsable' =>$request->responsable,
            'type'        =>$request->type,
            'lieu'        =>$request->lieu,
            'date_debut'  =>$request->date_debut,
            'date_fin'    =>$request->date_fin,
        ]);

        $projet = Projet::latest()->first();
        
        foreach ($request->video as $item) {
            $video=Videos::create([
                'id_proj'=>$projet->id,
                'id_activite'=>0,
                'URL'=>$item
            ]);
        }

        
      if ($request->has("Partenaire")) {
          foreach ($request->Partenaire as $item) {
            $video=Projet_partenaires::create([
                'id_proj'=>$projet->id,
                'id_part'=>$item
            ]);
        }
      }
        

        foreach ($request->photo as $item) {
            $photo=$item;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/projet',$newPhoto);

            $photo=Photo::create([
                'id_proj'=>$projet->id,
                'id_activite'=>0,
                'URL'=>'uploads/projet/'.$newPhoto
            ]);
        }
        return redirect()->back();
    }

    public function show($id)
    {
        $projet = Projet::where('id', $id)->first();
        return view('projets.show')->with('projet', $projet);
    }


    public function edit($id)
    {
        $projet = Projet::where('id', $id)->first();
        return view('projets.edit')->with('projet',$projet);
    }


    public function update(Request $request,  $id)
    {
        $projet = Projet::where('id', $id)->first();

        if (count($request->photo)>5) {
            return redirect()->back()->withErrors("maximum files is 5");
        }

        $this->validate($request, [
            'name'        => 'required',
            'detail'      => 'required',
            'responsable' => 'required',
            'lieu'        => 'required',
            'photo.*'     => 'mimes:jpg,png,jpeg|max:2048',
            'date_debut'  => 'required',
            'date_fin'    => 'required',
        ]);

        if ($request->has('photo')) {
            foreach ($projet->photo as $item) {
                if (File::exists(public_path($item->URL))) {
                    File::delete(public_path($item->URL));
                }
                $item->forceDelete();
            }

            foreach ($request->photo as $item) {
                $newPhoto = time().$item->getClientOriginalName();
                $item->move('uploads/projet',$newPhoto);
                $item->URL = 'uploads/projet/'.$newPhoto;
                $item=Photo::create([
                    'id_proj'=>$projet->id,
                    'id_activite'=>0,
                    'URL'=>'uploads/projet/'.$newPhoto
                ]);
            }
        } 
        
        if ($request->has('video')) {
            foreach ($projet->video as $item) {
                $item->forceDelete();
            }
            foreach ($request->video as $item) {
                $video=Videos::create([
                    'id_proj'=>$projet->id,
                    'id_activite'=>0,
                    'URL'=>$item
                ]);
            }
        } 

        $projet->name         = $request->name;
        $projet->detail       = $request->detail;
        $projet->responsable  = $request->responsable;
        $projet->lieu         = $request->lieu;
        $projet->date_debut   = $request->date_debut;
        $projet->date_fin     = $request->date_fin;
        $projet->save();
        return redirect()->back();
    }

    public function destroy( $id)
    {
        $projet = Projet::where('id', $id)->first();
        foreach ($projet->photo as $item) {
            if (File::exists(public_path($item->URL))) {
                File::delete(public_path($item->URL));
            }
            $item->forceDelete();
        }
        $projet->forceDelete();
        return redirect()->back();
    }
}
