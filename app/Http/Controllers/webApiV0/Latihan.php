<?php

namespace App\Http\Controllers\webApiV0;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exercise;

class Latihan extends Controller
{

    public function simpan(Request $request){

        $validator = $request->validate([
            'judul' => 'required|max:255',
            'user' => 'required',
            'deskripsi'  => 'required',
            'maks_poin'   => 'numeric|required|max:100',
        ], [
            'required' => 'Kolom :attribute harus diisi!',
            'max' => [
                'numeric'  => 'Kolom :attribute melebihi angka maksimum (:max)',
                'string'   => 'Kolom :attribute melebihi batas teks maksimum (:max)'

            ]
        ]);

        Exercise::create([
            'exercise_name'     => $validator['judul'],
            'description'       => $validator['deskripsi'],
            'max_score'         => $validator['maks_poin'],
            'course_archived'   => false,
        ]);
        return response()->json([
                'status' => true,
                'data' => $validator
        ]);



    }


}
