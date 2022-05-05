<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\activite;
use App\Models\Projet;
use App\Models\Adherent;
use App\Models\info;
use App\Models\Media;
use App\Models\Partenaire;
use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        $Info = info::latest()->first();
        $Acts = activite::all();
        $Clubs = Club::all();
        $Projet = Projet::all();
        $media = Media::all();
        $partenaire= Partenaire::all();
        return view('frontEnd.home')->with('info',$Info)->with('Acts',$Acts)->with('Clubs',$Clubs)->with('Projet',$Projet)->with('Part',$partenaire)->with("Media",$media);
    }


    public function about()
    {
        $Info = info::latest()->first();
        $teams = Team::all();
        return view('frontEnd.about')->with('info',$Info)->with('team',$teams);
    }

    public function soutenezNous()
    {
        $Info = info::latest()->first();
        // $teams = Team::all();
        return view('frontEnd.soutenezNous')->with('info',$Info);
    }


    public function activites()
    {
        $Acts = activite::paginate(9);
        
        return view('frontEnd.activites')->with('Activites',$Acts);
    }

    public function projets()
    {
        $projets = Projet::paginate(3);
        
        return view('frontEnd.projets')->with('projets',$projets);
    }


    public function showActivite($id)
    {
        $Acts = activite::where('id',$id)->first();
        
        return view('frontEnd.showActivite')->with('Activite',$Acts);
    }


    public function showProjet($id)
    {
        $Projet = Projet::where('id',$id)->first();
        
        return view('frontEnd.showProjet')->with('Projets',$Projet);
    }


    public function getInsc()
    {
        return view('frontEnd.inscription');
    }


    
}
