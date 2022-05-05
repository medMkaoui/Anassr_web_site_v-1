<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::all();
        return view('medias.index')->with('medias',$medias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('medias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required', 
            'lieu'=> 'required', 
            'date'=> 'required', 
            'url'=> 'required', 
            'logo'=>'required|image|mimes:jpeg,jpg,png',
            
        ]);

        $logo = time().$request->logo->getClientOriginalName();
        $request->logo->move('uploads/medias',$logo);
        $logo = 'uploads/medias/'.$logo;
       
        // Hadi ghatnfe3 bach  tgad size dyal l'img 
            // Image::make($image->getRealPath())->resize(300, 300)->save($path);

        //
        $media = Media:: create($request->except(['logo'])+ ['logo'=>$logo]);
        return redirect()->back()->with('message','Media Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = Media::where('id',$id)->first();
        return view('medias.edit')->with("media",$media);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $media = Media::where('id', $id)->first();
        $this->validate($request, [
            'name'=> 'required', 
            'lieu'=> 'required', 
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
            // dd( $newimage);
        }
        $media->logo=$logo;
        $media->save();

        return redirect()->back()->with('message','Media Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
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
