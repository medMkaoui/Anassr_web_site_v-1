<?php

namespace App\Http\Controllers;

use App\Models\Team;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class TeamController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
   
    public function index()
    {
        $teams = Team::all();
        return view('teams.index')->with('teams', $teams);
    }

   
    public function create()
    {
       return view('teams.create');
    }

    public function generatePDF($id)
    {
        $team = Team::where('id',$id)->first();
        $data = [
            'f_name' => $team->first_name,
            'l_name' => $team->last_name,
            'statu' => $team->statu,
            'description' => $team->description,
            'photo' => $team->photo,
            'mail' => $team->mail,
            'date_mp' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('teams.fmember', $data);
    
        return $pdf->download('teams.fmember.pdf');
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'=> 'required|max:10',
            'last_name'=> 'required|max:10',
            'statu'=> 'required|max:20',
            'photo'=> 'required|image|max:2048',
            'description'=> 'required|max:100',
            'mail'=> 'required|max:35',
        ]);
        

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/teams',$newPhoto);
        
        $team = Team::create([
            'first_name'  => $request->first_name,
            'last_name'  => $request->last_name,
            'statu'  => $request->statu,
            'photo'  =>'uploads/teams/'.$newPhoto,
            'description'  => $request->description,
            'mail'  => $request->mail,
        
        ]);
        return redirect()->back();
    }

    public function show(Team $team)
    {
        //
    }

    public function edit( $id)
    {
        $team = Team::where('id', $id)->first();
        return view('teams.edit')->with('team',$team);
    }

    public function update(Request $request,  $id)
    {
        $team = Team::where('id', $id)->first();
        $this->validate($request, [
            'first_name'=> 'required|max:10',
            'last_name'=> 'required|max:10',
            'statu'=> 'required|max:20',
            'photo'=> 'image|max:2048',
            'description'=> 'required|max:100',
            'mail'=> 'required|max:35',
        ]);

        if ($request->has('photo')) {
            if (File::exists(public_path($team->photo))) {
                File::delete(public_path($team->photo));
            }  
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/teams',$newPhoto);
            $team->photo='uploads/teams/'.$newPhoto;
        }
       
        
        
        $team->first_name  = $request->first_name;
        $team->last_name  = $request->last_name;
        $team->statu  = $request->statu;
        $team->description  = $request->description;
        $team->mail  = $request->mail;
        $team->save();
        return redirect()->back();
    }

    public function destroy( $id)
    {
        $team = Team::where('id', $id)->first();
        if (File::exists(public_path($team->photo))) {
            File::delete(public_path($team->photo));
        }  
        $team->forceDelete();
        return redirect()->back();
    }
}
