<?php

namespace App\Http\Controllers\webApiV0;

use App\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Submisi extends Controller
{
    public function periksa($id, Request $request)
    {
        $submission = Submission::find($id);
        if ($request->status == 'TO') {
            $submission->is_checked = true;
            $submission->is_accepted = false;
            $submission->notes = $request->sub_notes;
            $submission->score_achieved = 0;
            $submission->save();
            return redirect('/pengurus/dashboard')->with('status', 'Tugas tersebut sudah diperiksa!');

        } elseif ($request->status == 'TE') {
            $submission->is_checked = true;
            $submission->is_accepted = true;
            $submission->notes = $request->sub_notes;
            $submission->score_achieved = $request->sub_poin;
            $submission->save();
            return redirect('/pengurus/dashboard')->with('status', 'Tugas tersebut sudah diperiksa!');
        }
    }

}
