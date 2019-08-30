<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Submission;
use Illuminate\Http\Request;
use Auth;

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
        if(Auth::user()->role_lvl == 0)
        {
            abort(403, 'Untuk masuk, anda harus diaktifkan oleh pengurus CSS. Silahkan minta pengurus untuk mengaktifkan akun anda');
        }
        elseif(Auth::user()->role_lvl >= 1)
        {
            $mysubmission = Submission::where('user_id', Auth::user()->id)->where('is_checked', true)->where('is_accepted', true)->get();
            $score = 0;
            $done = 0;
            foreach($mysubmission as $ms)
            {
                $score = $score + $ms->score_achieved;
                $done++;
            }

            return view('home')->with(
                [
                    'score'         => $score,
                    'reviewed'      => $mysubmission,
                    'done_proj'     => $done,
                    'task'          => Exercise::where('course_archived', false)->get(),
                    'pendingsub'    => Submission::where('is_checked', false)->where('is_accepted', false)->where('user_id', Auth::user()->id)->get(),
                    'pending_count' => Submission::where('is_checked', false)->where('is_accepted', false)->where('user_id', Auth::user()->id)->count(),
                    'failed_task' => Submission::where('is_checked', true)->where('is_accepted', false)->where('user_id', Auth::user()->id)->get(),
                    'reviewed_s'    => Submission::where('user_id', Auth::user()->id)->where('score_achieved', '>', 0)->count(),
                ]
            );

        }
    }
}
