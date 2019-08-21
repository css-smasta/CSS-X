<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LatihanController extends Controller
{
    public function lihat_latihan($id){
        $taskcount = Submission::where('course_id', $id)->where('user_id', Auth::user()->id)->get();
        $task_info = Exercise::find($id);
        if(@$taskcount->count() > 0){
            return redirect('/home')->with('status', '<b>Info:</b> Sudah kamu kerjakan. Lihat review di tab belum di review. atau bila sudah di review, akan muncul disamping.');
        }elseif($task_info->course_archived == true){
            return redirect('/home')->with('status', '<b>Info:</b> Maaf, tugas ini sudah ditutup. Sayang sekali, anda tidak bisa submisi lagi!');
        }else{
            return view('see_course')->with('course', $task_info);
        }
    }

    public function upload_latihan(Request $request, $id){
        // Validation
        $validated = $request->validate(
            ['course_file' => 'required|mimetypes:text/html,image/jpeg,image/png|max:2000']
        );

        $filefinal = str_replace(' ', '', $validated['course_file']->getClientOriginalName())."-".uniqid()."-uploadby-".str_replace(' ', '', Auth::user()->name).".".$validated['course_file']->getClientOriginalExtension();
        $submission = new Submission;
        $submission->course_id = intval($id);
        $submission->user_id = Auth::user()->id;
        $submission->notes = "masukkan catatan...";
        $submission->file_name = $filefinal;
        $submission->score_achieved = 0;
        $submission->reviewer_id = 0;
        $submission->save();
        $request->file('course_file')->storeAs('public/submittedcourse', $filefinal);
        return Redirect('/home')->with('status', 'Tugas sudah diupload. tunggu pengurus memeriksa tugas anda');
    }
}
