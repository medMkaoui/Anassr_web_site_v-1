<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdherentController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adherents = Adherent::all();
        return view("adherents.index")->with("adherents",$adherents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("adherents.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'first_name'=> 'required', 
            'last_name'=> 'required', 
            'email'=> 'required', 'phone'=> 'required', 
            'adresse'=> 'required', 
            'image'=>'required|image|mimes:jpeg,jpg,png|max:2048',
            'lieu_naissance'=> 'required',    
            'nationalite'=> 'required', 'date_naissance'=> 'required', 
            'ville'=> 'required', 'profession'=> 'required', 
            'cin'=> 'required', 'niveau_scolaire'=> 'required', 
            'read_statu'=> 'required', 
        ]);

        $newHero = time().$request->image->getClientOriginalName();
        $request->image->move('uploads/adherents',$newHero);
        $newHero = 'uploads/adherents/'.$newHero;
       
// Hadi ghatnfe3 bach  tgad size dyal l'img 
                    // Image::make($image->getRealPath())->resize(300, 300)->save($path);

        // dd($request->image);
        if ($request->read_statu=="on") {
            $request->merge(['read_statu' => 1]);
        } else {
            $request->merge(['read_statu'=> 0]);
        }

        $adherent = Adherent:: create($request->except(['image'])+ ['image'=>$newHero]);
        return redirect()->back()->with('message','Teacher Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adherent  $adherent
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $adherents = Adherent::where('id',$id)->first();
        return view("adherents.edit")->with("adherents",$adherents);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adherent  $adherent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adherents = Adherent::where('id',$id)->first();
        return view("adherents.edit")->with("adherents",$adherents);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adherent  $adherent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $adherent = Adherent::where('id', $id)->first();
        $this->validate($request, [
            'first_name'=> 'required', 
            'last_name'=> 'required', 
            'email'=> 'required', 'phone'=> 'required', 
            'adresse'=> 'required', 
            'lieu_naissance'=> 'required',    
            'nationalite'=> 'required', 'date_naissance'=> 'required', 
            'ville'=> 'required', 'profession'=> 'required', 
            'cin'=> 'required', 'niveau_scolaire'=> 'required',
            'read_statu'=> 'required',
        ]);
  
        if ($request->read_statu=="on") {
            $request->merge(['read_statu' => 1]);
        } else {
            $request->merge(['read_statu'=> 0]);
        }
         $newimage = $adherent->image;

        // dd($request['image']);
        $input= $request->all();
        $adherent->fill($input)->save();

        if ($request->has('image')) {
            if (File::exists(public_path($adherent->image)))
            {
                File::delete(public_path($adherent->image));
            }
            $newimage = time().$request->image->getClientOriginalName();
            $request->image->move('uploads/adherents',$newimage);
            $newimage='uploads/adherents/'.$newimage;
            // dd( $newimage);
        }
        $adherent->image=$newimage;
        $adherent->save();

        return redirect()->back()->with('message','Adherent Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adherent  $adherent
     * @return \Illuminate\Http\Response
     */
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
