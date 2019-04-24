<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Http\Resources\UserResource;


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
        // return UserResource::collection(User::all()); 
        return view('home');
    }

    public function getFriends() 
    { 
        return UserResource::collection(User::where('id', '!=', auth()->id())->get()); 
    }
}
