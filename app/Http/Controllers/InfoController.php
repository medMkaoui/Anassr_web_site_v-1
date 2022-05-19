<?php

namespace App\Http\Controllers;

use App\Models\info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
  
    public function edit()
    {
        $info = info::first();
            if ($info==null) 
            {
                $info = info::Create([
                    'whatsapp'          =>'whatsapp de votre association',
                    'fb'                =>'fb de votre association', 
                    'instagram'         =>'instagram de votre association',
                    'youtube'           =>'youtube de votre association',
                    'linkdin'         => 'linkdin de votre association', 
                    'video_apropos'     =>'apropos de votre association',
                    'video_support'     =>'support de votre association',
                    'adresse'           =>'adresse de votre association', 
                    'mot_president'     =>'mot de président de votre association',
                    'vision'            =>'vision de votre association', 
                    'how_we_work'       =>'how we work de votre association',
                    'how_support_us'    =>'suppots pour votre association',
                    'txtAdheration'    =>'suppots pour votre association'
                    ]);
            }
        return view('infos.edit')->with('info', $info);
    }

   
    public function update(Request $request, $id)
    {
        $info = info::where('id',$id)->first();
        $this->validate($request, [
            'whatsapp' =>'required',
            'fb' =>'required', 
            'instagram' =>'required', 
            'linkdin' =>'required', 
            'youtube' =>'required', 
            'video_apropos' =>'required',
            'video_support' =>'required',
            'adresse' =>'required', 
            'mot_president' =>'required|max:650',
            'vision' =>'required|max:1000', 
            'how_we_work' =>'required|max:1000',
            'how_support_us' =>'required',
            'txtAdheration' =>'required']);

        
        $info->whatsapp = $request->whatsapp;
        $info->fb = $request->fb;
        $info->linkdin = $request->linkdin;
        $info->youtube = $request->youtube;
        $info->video_apropos = $request->video_apropos;
        $info->video_support = $request->video_support;
        $info->adresse = $request->adresse;
        $info->mot_president = $request->mot_president;
        $info->vision = $request->vision;
        $info->how_we_work = $request->how_we_work;
        $info->txtAdheration = $request->txtAdheration;
        $info->how_support_us = $request->how_support_us;
     

        $info->save();
        return redirect()->back();
    }
    
 
}
