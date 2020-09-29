<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Education;
use App\Models\Experience;

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
        $user = User::with('info')->find(1);
        $edu = Education::orderBy('year','DESC')->get();
        $exp = Experience::orderBy('year','DESC')->get();

        return view('home',compact(['user','edu','exp']));
    }
}
