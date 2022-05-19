<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class MediaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $medias = Media::all();
        return view('medias.index')->with('medias',$medias);
    }

    public function create()
    {
        
        return view('medias.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|string|max:20', 
            'lieu'=> 'required|string|max:20', 
            'date'=> 'required', 
            'url'=> 'required', 
            'logo'=>'required|image|mimes:jpeg,jpg,png',
            
        ]);

        $logo = time().$request->logo->getClientOriginalName();
        $request->logo->move('uploads/medias',$logo);
        $logo = 'uploads/medias/'.$logo;
       
        $media = Media:: create($request->except(['logo'])+ ['logo'=>$logo]);
        return redirect()->back()->with('message','Media Added Successfully!');
    }

    public function show(Media $media)
    {
        //
    }

    public function edit($id)
    {
        $media = Media::where('id',$id)->first();
        return view('medias.edit')->with("media",$media);
    }

    public function update(Request $request,  $id)
    {
        $media = Media::where('id', $id)->first();
        $this->validate($request, [
            'name'=> 'required|string|max:20', 
            'lieu'=> 'required|string|max:20', 
            'date'=> 'required', 
            'url'=> 'required', 
        ]);
        $logo= $media->logo;
        if ($request->has('logo')) {
            if (File::exists(public_path($media->logo)))
            {
                File::delete(public_path($media->logo));
            }
            $logo = time().$request->logo->getClientOriginalName();
            $request->image->move('uploads/medias',$logo);
            $logo='uploads/medias/'.$logo;
        }
        $media->logo = $logo;
        $media->name = $request->name;
        $media->lieu = $request->lieu;
        $media->url   = $request->url;
        $media->date = $request->date;
        $media->save();
        return redirect()->back()->with('message','Media Updated Successfully!');
    }

    public function destroy( $id)
    {
        $media = Media::where('id', $id)->first();
        if (File::exists(public_path($media->logo)))
        {
            File::delete(public_path($media->logo));
        }
        $media->forceDelete();
        return redirect()->back()->with('message','Media deleted Successfully!');
    }
}
