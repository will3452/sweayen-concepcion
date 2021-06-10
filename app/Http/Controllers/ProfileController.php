<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profiles.index');
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('password')) $request['password'] = Hash::make($request->password);
        if($request->has('logo')){
            $request->logo->move(public_path('vendor/adminlte/dist/img'), 'AdminLTELogo.png');
        }
        User::find(1)->update(['name'=>$request['name'], 'password'=>$request['password'], 'email'=>$request['email']]);
        return back()->withSuccess('Done!');
    }

    
}
