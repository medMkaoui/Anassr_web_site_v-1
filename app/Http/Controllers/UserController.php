<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

   
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('users.edit')->with('user',$user);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->name =$request->name;
        // $user->email =$request->email;
        $user->password = Crypt::encrypt($request->password);

        $user->save();

        return redirect()->route('users');

    }

   
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        $user->forceDelete();
        return redirect()->back();
    }
}
