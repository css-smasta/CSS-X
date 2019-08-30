<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Submission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LatihanController extends Controller
{
    public function __construct()
    {
        // Ga usah dibuatin custom rules, juga cuma dipake 2x
        $this->upload_validator = 'required|mimetypes:text/html,image/jpeg,image/png|max:2000';
    }

    public function lihat_latihan($id){
        $taskcount = Submission::where('course_id', $id)->where('user_id', Auth::user()->id)->get();
        $task_info = Exercise::find($id);
        if(@$taskcount->count() > 0){
            return redirect('/home')->with('status', 'Sudah kamu kerjakan. Lihat review di tab belum di review. atau bila sudah di review, akan muncul disamping.');
        }elseif($task_info->course_archived == true){
            return redirect('/home')->with('status', 'Maaf, tugas ini sudah ditutup. Sayang sekali, anda tidak bisa submisi lagi!');
        }else{
            return view('latihan.upload_latihan')->with('course', $task_info);
        }
    }

    public function form_revisi_submisi($id)
    {
        $submission = Submission::find($id);
        if ($submission->is_checked == true && $submission->is_accepted == true) {
            return redirect('home')->with('status', 'Tugas anda sudah diterima. Tugas yang sudah diterima tidak dapat diedit kembali.');
        }
        return view('latihan.revisi_latihan');
    }

    public function revisi_submisi(Request $request, $id)
    {
        $submission = Submission::find($id);
        if ($submission->is_checked == true && $submission->is_accepted == true) {
            return redirect('home')->with('status', 'Tugas anda sudah diterima. Tugas yang sudah diterima tidak dapat diedit kembali.');
        }


        $validated = $request->validate(
            ['course_file' => $this->upload_validator]
        );
        $filefinal = str_replace(' ', '', $validated['course_file']->getClientOriginalName())."-".uniqid()."-uploadby-".str_replace(' ', '', Auth::user()->name).".".$validated['course_file']->getClientOriginalExtension();

        if ($submission->user_id == Auth::user()->id) {

            $submission->is_checked = false;
            $submission->is_accepted = false;
            Storage::delete('public/submittedcourse/' . $submission->file_name);
            $submission->file_name = $filefinal;
            $request->file('course_file')->storeAs('public/submittedcourse', $filefinal);
            $submission->save();
            return Redirect('/home')->with('status', 'Tugas sudah direvisi. tunggu pengurus memeriksa tugas anda');
        } else {
            return view('home')->with('status', 'bukan submisi anda!');
        }

    }

    public function upload_latihan(Request $request, $id)
    {
        // Validation
        $validated = $request->validate(
            ['course_file' => $this->upload_validator]
        );

        $filefinal = str_replace(' ', '', $validated['course_file']->getClientOriginalName()) . "-" . uniqid() . "-uploadby-" . str_replace(' ', '', Auth::user()->name) . "." . $validated['course_file']->getClientOriginalExtension();


        Submission::create([
            'course_id' => intval($id),
            'user_id' => Auth::user()->id,
            'notes' => 'Mohon masukkan catatan',
            'file_name' => $filefinal,
            'score_achieved' => 0,
            'reviewer_id' => 0

        ]);
        $request->file('course_file')->storeAs('public/submittedcourse', $filefinal);
        return Redirect('/home')->with('status', 'Tugas sudah diupload. tunggu pengurus memeriksa tugas anda');
    }

    public function lihat_submisi($id)
    {
        @$submission = Submission::find($id);
        $reviewer;
        $check_verdict;
        if ($submission->is_checked == true || $submission->is_accepted == false) {
            $reviewer = User::find($submission->reviewer_id);
        } else {
            $reviewer = 'belum di review';
        }
        if ($submission->is_checked == true && $submission->is_accepted == true) {
            $check_verdict = 'Sudah diterima';
        } elseif ($submission->is_checked == true && $submission->is_accepted == false) {
            $check_verdict = 'Ditolak';
        } else {
            $check_verdict = 'Belum diperiksa';
        }
        return view('latihan.lihat')->with('submission', $submission)->with(
            [
                'reviewer' => $reviewer,
                'check_verdict' => $check_verdict
            ]
        );
    }
}
