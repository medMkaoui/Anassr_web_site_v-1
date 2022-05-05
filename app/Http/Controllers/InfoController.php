<?php

namespace App\Http\Controllers;

use App\Models\info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
  
    public function edit()
    {
        $info = info::first();
            if ($info==null) {
                $info = info::Create([
                    'nom'               => 'nom de votre association',
                    'slug'              =>'slug de votre association', 
                    'whatsapp'          =>'whatsapp de votre association',
                    'fb'                =>'fb de votre association', 
                    'instagram'         =>'instagram de votre association', 
                    'youtube'           =>'youtube de votre association', 
                    'video_apropos'     =>'apropos de votre association',
                    'video_support'     =>'support de votre association',
                    'rib'               =>'rib de votre association', 
                    'nom_banque'        =>'nomde banque de votre association', 
                    'tel_trisorie'      =>'tel de votre association',
                    'adresse'           =>'adresse de votre association', 
                    'mot_president'     =>'mot de président de votre association',
                    'vision'            =>'vision de votre association', 
                    'how_we_work'       =>'how we work de votre association',
                    'how_support_us'    =>'suppots pour votre association']
                 );
            }
        return view('infos.edit')->with('info', $info);
    }

   
    public function update(Request $request, $id)
    {
        $info = info::where('id',$id)->first();
        // dd($info);
        $this->validate($request, [
            'nom' => 'required',
            'slug'=>'required', 
            'whatsapp' =>'required',
            'fb' =>'required', 
            'instagram' =>'required', 
            'youtube' =>'required', 
            'video_apropos' =>'required',
            'video_support' =>'required',
            'rib' =>'required', 
            'nom_banque' =>'required', 
            'tel_trisorie' =>'required',
            'adresse' =>'required', 
            'mot_president' =>'required',
            'vision' =>'required', 
            'how_we_work' =>'required',
            'how_support_us' =>'required']);

        $info->nom = $request->nom;
        $info->slug = $request->slug;
        $info->whatsapp = $request->whatsapp;
        $info->fb = $request->fb;
        $info->youtube = $request->youtube;
        $info->video_apropos = $request->video_apropos;
        $info->video_support = $request->video_support;
        $info->rib = $request->rib;
        $info->nom_banque = $request->nom_banque;
        $info->tel_trisorie = $request->tel_trisorie;
        $info->adresse = $request->adresse;
        $info->mot_president = $request->mot_president;
        $info->vision = $request->vision;
        $info->how_we_work = $request->how_we_work;
        $info->how_support_us = $request->how_support_us;
     

        $info->save();
        return redirect()->back();
    }
    
 
}
