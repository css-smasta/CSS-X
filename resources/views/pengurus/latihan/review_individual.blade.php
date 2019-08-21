@extends('layouts.app')
@section('stylesheet')
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Review submisi {{$submission->users->name}}</div>
            <div class="card-body">
                <h3>Review Tugas</h3>
                <p class="text-muted">
                    Nama File: {{$submission->file_name}} <br>
                    Tugas: {{$submission->exercises->exercise_name}} <br>
                    Maks Poin: {{$submission->exercises->max_score}} poin <br>
                    Waktu upload: {{$submission->created_at}}
                </p>
                <hr>

                        <iframe style="height:500px; width:100%" src="{{ asset('storage/submittedcourse/'.$submission->file_name) }}" frameborder="0"></iframe>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-5 col-lg-5 col-sm-12">
                    <div class="card">
                            <div class="card-header">Deskripsi tugas</div>
                            <div class="card-body">
                                <p class="text-muted">
                                    {!! $submission->exercises->description !!}
                                </p>
                                <hr>

                            </div>
                    </div>
            </div>
            <div class="col-md-7 col-lg-7 col-sm-12">
                <div class="card">
                    <div class="card-header">Berikan penilaian</div>
                    <div class="card-body">
                        <div class="alert alert-warning">
                            <b>PERHATIAN!</b>
                            <ol>
                                <li>Penilaian harus diisi dengan objektif, sesuai dengan kualitas tugas.</li>
                                <li>Harap memastikan bahwa evaluasi anda sudah benar. Setelah anda men-submit, anda tidak bisa lagi mengeditnya melalui tab review submisi. Namun, anda dapat mencari tugas ini di tab 'Arsip submisi' atau dengan meng-copy link diatas untuk mengedit di lain waktu</li>
                                <li>Bila anda ingin <b>menolak</b> submisi, harap isi notes agar pemilik tugas tahu apa yang harus diperbaiki.</li>

                            </ol>
                        </div>
                        <form action="" method="POST">
                            <input name="_method" type="hidden" value="PUT">
                            @csrf
                            <label for="sub_poin">Berikan poin</label>
                            <input type="text" class="form-control" name="sub_poin" id="sub_poin">

                            <label for="sub_notes">Evaluasi anda</label>
                            <textarea type="text" class="form-control" name="sub_notes" id="sub_notes"> </textarea>
                            <button type="submit" class="mt-2 btn btn-success">Finalisasi</button>
                            <button type="submit" class="mt-2 btn btn-danger" onclick="tolakSubmisi()">Tolak submisi</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        CKEDITOR.replace("sub_notes");
    </script>

            <script></script>
@endsection
