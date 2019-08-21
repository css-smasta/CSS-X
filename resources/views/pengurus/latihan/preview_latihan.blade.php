@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="../{{$submission->id}}" class="btn btn-outline-primary mb-2"><i class="fas fa-pencil-alt"></i> Edit nilai</a>
        <div class="card">
            <div class="card-header">Lihat hasil penilaian</div>
            <div class="card-body">
                <p class="text-muted">
                    Nama File: {{$submission->file_name}} <br>
                    Tugas: {{$submission->exercises->exercise_name}} <br>
                    Maks Poin: {{$submission->exercises->max_score}} poin <br>
                    Waktu upload: {{$submission->created_at}}
                </p>
                <div class="mt-3">
                    <div class="card">
                        <iframe style="height:300px; width:100%" src="{{ asset('storage/submittedcourse/'.$submission->file_name) }}" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">Status submisi</div>
                    <div class="card-body">
                        @if ($submission->status == false)
                            <h3>Belum di periksa!</h3>
                        @else
                            <h3>Tugas kamu sudah diperiksa!</h3>
                            <p class="text-muted">
                                Pemeriksa: {{$reviewer->name}} <br>
                                Perolehan skor: {{$submission->score_achieved}} / {{$submission->exercises->max_score}}
                            </p>
                            <hr>
                            <h3>Catatan:</h3>
                            <div class="alert alert-warning"><b>Info:</b> catatan ini mohon dibaca agar kedepannya dapat menjadi lebih baik!</div> <br>
                            {!! $submission->notes !!}

                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">Deskripsi tugas</div>
                    <div class="card-body">
                        <p class="text-muted">
                            {!! $submission->exercises->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
