<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $genders = Record::GENDER();
        $fourpeaces = Record::FOURPEACE();
        $phmembers = Record::PHILHEALTH();
        $ages = Record::AGE();
        $eccdf1k = Record::ECCDF1K_STAT();
        return view('home', compact('genders', 'fourpeaces', 'phmembers','ages', 'eccdf1k'));
    }
}
