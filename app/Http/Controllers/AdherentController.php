<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class AdherentController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('store');
    }

    public function index()
    {
        $adherents = Adherent::all();
        return view("adherents.index")->with("adherents",$adherents);
    }

    public function create()
    {
        return view("adherents.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'=> 'required|string|max:10', 
            'last_name'=> 'required|string|max:10', 
            'email'=> 'required|string|max:40', 'phone'=> 'required|string|max:13', 
            'adresse'=> 'required|string|max:30  ', 
            'lieu_naissance'=> 'required|string|max:30',    
            'nationalite'=> 'required|string|max:20', 'date_naissance'=> 'required', 
            'ville'=> 'required|string|max:20', 'profession'=> 'required|string|max:20', 
            'cin'=> 'required|string|max:10', 'niveau_scolaire'=> 'required|string|max:10',
            'read_statu'=> 'required',
            'image'=>'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $newHero = time().$request->image->getClientOriginalName();
        $request->image->move('uploads/adherents',$newHero);
        $newHero = 'uploads/adherents/'.$newHero;
       
        if ($request->read_statu=="on") {
            $request->merge(['read_statu' => 1]);
        } else {
            $request->merge(['read_statu'=> 0]);
        }

        $adherent = Adherent:: create($request->except(['image'])+ ['image'=>$newHero]);
        return redirect()->back()->with('message','Teacher Added Successfully!');
    }

    public function show( $id)
    {
        $adherents = Adherent::where('id',$id)->first();
        return view("adherents.edit")->with("adherents",$adherents);
    }

    public function edit($id)
    {
        $adherents = Adherent::where('id',$id)->first();
        return view("adherents.edit")->with("adherents",$adherents);
    }

    public function update(Request $request,$id)
    {
        $adherent = Adherent::where('id', $id)->first();
        $this->validate($request, [
            'first_name'=> 'required|string|max:10', 
            'last_name'=> 'required|string|max:10', 
            'email'=> 'required|string|max:40', 'phone'=> 'required|string|max:13', 
            'adresse'=> 'required|string|max:30  ', 
            'lieu_naissance'=> 'required|string|max:30',    
            'nationalite'=> 'required|string|max:20', 'date_naissance'=> 'required', 
            'ville'=> 'required|string|max:20', 'profession'=> 'required|string|max:20', 
            'cin'=> 'required|string|max:10', 'niveau_scolaire'=> 'required|string|max:10',
            'read_statu'=> 'required',
            'image'=>'image|mimes:jpeg,jpg,png|max:2048',
        ]);
         $newimage = $adherent->image;
        if ($request->read_statu=="on") {
            $request->merge(['read_statu' => 1]);
        } else {
            $request->merge(['read_statu'=> 0]);
        }
        if ($request->has('image')) {
            if (File::exists(public_path($adherent->image)))
            {
               File::delete(public_path($adherent->image));
            }
            $newimage = time().$request->image->getClientOriginalName();
            $request->image->move('uploads/adherents',$newimage);
            $newimage='uploads/adherents/'.$newimage;
        }
        $input= $request->all();
        $adherent->fill($input)->save();
        $adherent->image=$newimage;
        $adherent->save();
        return redirect()->back()->with('message','Adherent Updated Successfully!');
    }

    public function destroy($id)
    {
        $adherent = Adherent::where('id', $id)->first();
        if (File::exists(public_path($adherent->image)))
        {
            File::delete(public_path($adherent->image));
        }
        $adherent->forceDelete();
        return redirect()->back()->with('message','Adherent deleted Successfully!');

    }
}
