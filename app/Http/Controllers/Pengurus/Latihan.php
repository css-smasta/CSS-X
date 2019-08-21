<?php

namespace App\Http\Controllers\Pengurus;

use App\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Latihan extends Controller
{
    public function index(){

    }

    public function create(){
        return view('pengurus.latihan.buat_latihan');
    }

    public function review($id){
        $submission = Submission::find($id);
        return view('pengurus.latihan.review_individual')->with('submission', $submission);
    }
    public function list(){
        return view('pengurus.latihan.review_latihan')->with('submission', Submission::where('is_checked', false)->orWhere('is_accepted', false)->orderBy('course_id', 'asc')->orderBy('created_at', 'asc')->get());
    }
}
