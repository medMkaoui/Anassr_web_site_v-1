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
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('dashboard');
    }

    public function index()
    {
        $user = User::all()->first();
        if($user == null){
            User::create([
                'name' => "Admin",
                'email' => "Admin@gmail.com",
                'password' => Hash::make("Admin"),
            ]);
        }
        $Info = info::latest()->first();
        if($Info == null){
            return redirect()->route('info');
        }
        $Acts = activite::all();
        $Clubs = Club::all();
        $Projet = Projet::all();
        $media = Media::all();
        $partenaire= Partenaire::all();
        return view('frontEnd.home')->with('info',$Info)->with('Acts',$Acts)->with('Clubs',$Clubs)->with('Projet',$Projet)->with('Part',$partenaire)->with("Media",$media);
    }

    public function dashboard()
    {
        return view('home');
    }


    public function about()
    {
        $Info = info::latest()->first();
        $teams = Team::all();
        return view('frontEnd.about')->with('info',$Info)->with('team',$teams)->with('name','Qui somme Nous');
    }

    public function soutenezNous()
    {
        $Info = info::latest()->first();
        // $teams = Team::all();
        return view('frontEnd.soutenezNous')->with('info',$Info)->with('name','Soutenez Nous');
    }


    public function activites()
    {
        $Acts = activite::paginate(9);
        
        return view('frontEnd.activites')->with('Activites',$Acts)->with('name','Nos Activités');
    }

    public function projets()
    {
        $projets = Projet::all();
        
        return view('frontEnd.projets')->with('projets',$projets)->with('name','Nos Projets');
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
        $Info = info::latest()->first();
        return view('frontEnd.inscription')->with('info',$Info)->with('name','Inscription');
    }

    public function statu()
    {
        
        return view('frontEnd.statuPage');
    }


    
}
