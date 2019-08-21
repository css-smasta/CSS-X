<?php

namespace App\Http\Controllers\Pengurus;

use App\Exercise;
use App\Submission;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    public function index(){
        return view('pengurus.home')->with([
            'notverified' => User::where('role_lvl', 0)->count(),
            'totaluser' => User::all()->count(),
            'alltask' => Exercise::all()->count(),
            'notchecked' => Submission::where('is_checked', false)->where('is_accepted', false)->count()
        ]);
    }
}
