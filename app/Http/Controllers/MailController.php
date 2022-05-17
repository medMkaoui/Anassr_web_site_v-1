<?php

namespace App\Http\Controllers;

use App\Models\mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('store');
    }
    
    public function index()
    {
        $mails = mail::all();
        return view('mails.index')->with('mails', $mails);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'mail' => 'required'
        ]);

        $mail = mail::create($request->all());
        return redirect()->back();
    }


    public function destroy( $id)
    {
        $mail = mail::where('id', $id)->first();
        $mail->forceDelete();
        return redirect()->back();
    }
}
