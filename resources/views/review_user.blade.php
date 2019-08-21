@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;&nbsp;Tugas anda belum diperiksa, mintalah pengurus untuk memeriksa tugas anda
        </div>
        <div class="card">
            <div class="card-header">Review submisi</div>
            <div class="card-body">
                <h4>{{$submission->courses->course_name}}</h4>
                <div class="mt-3">
                    <div class="card">
                            <iframe style="height:300px; width:100%" src="{{ asset('storage/submittedcourse/'.$submission->file_name) }}" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">Status submisi</div>
            <div class="card-body">
                    @if ($submission->status == false)
                    <h3> <i class="far fa-times-circle"></i> Tugas anda belum diperiksa. Silahkan kontak pengurus untuk segera memeriksa tugas anda.</h3>
                    @else
                    <h3>Tugas kamu sudah diperiksa!</h3>
                    <p class="text-muted">
                        Pemeriksa: {{$reviewer->name}} <br>
                        Perolehan skor: {{$submission->score_achieved}} / {{$submission->courses->max_score}}
                    </p>
                    <hr>
                    <h3>Catatan:</h3>
                    <div class="alert alert-warning"><b>Info:</b> catatan ini mohon dibaca agar kedepannya dapat menjadi lebih baik!</div> <br>
                    {!! $submission->notes !!}

                    @endif
            </div>
        </div>
    </div>

@endsection
