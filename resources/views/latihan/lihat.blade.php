@extends('layouts.app')

@section('content')
    <div class="container">
        @if($submission->is_checked == false && $submission->is_accepted == false)
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>&nbsp; <b>INFO:</b> <br>Tugas anda belum
                diperiksa, mintalah pengurus untuk memeriksa tugas anda.
                <br> Sebelum tugas anda diperiksa, anda bebas mengeditnya.
            </div>
        @elseif($submission->is_checked == true && $submission->is_accepted == false)
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>&nbsp; <b>INFO:</b> <br>Tugas anda TIDAK
                DITERIMA, segeralah revisi dan minta pengurus untuk memeriksa tugas anda.
            </div>
        @endif
        <div class="row mt-2">
            <div class="mb-3 col-md-5 col-xs-12">
                <div class="card-deck" style="height: 100%">
                    @include('layouts.snippets.card', [
                       'card_icon' => 'fas fa-list',
                       'card_text' => 'Nama tugas',
                       'card_body' => $submission->exercises->exercise_name
                   ])
                </div>
            </div>
            <div class="mb-3 col-md-7 col-xs-12">
                <div class="card-deck" style="height: 100%">
                    @include('layouts.snippets.card', [
                       'card_icon' => 'fas fa-star',
                       'card_text' => 'Poin Maksimal',
                       'card_body' => $submission->exercises->max_score
                   ])
                    @include('layouts.snippets.card', [
                        'card_icon' => 'fas fa-edit',
                        'card_text' => 'Revisi tugas',
                        'card_body' => '<a href="../submisi/'.$submission->id .'/revisi">Klik disini</a>'
                    ])
                    @include('layouts.snippets.card', [
                       'card_icon' => 'fas fa-check',
                       'card_text' => 'Status Tugas',
                       'card_body' => $check_verdict
                   ])
                </div>
            </div>
        </div>
        @if($submission->is_checked == false || $submission->is_accepted == false)

        @endif

        <div class="card">
            <div class="card-header">Review submisi</div>
            <div class="card-body">
                <div class="mt-3">
                    <div class="card">
                        <iframe style="height:300px; width:100%"
                                src="{{ asset('storage/submittedcourse/'.$submission->file_name) }}"
                                frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="mb-3 col-md-5 col-xs-12">
                <div class="card">
                    <div class="card-header">Status submisi</div>
                    <div class="card-body">
                        @if($submission->is_checked == false && $submission->is_accepted == false)
                            <h3><i class="far fa-times-circle"></i> Tugas anda belum diperiksa. Silahkan kontak pengurus
                                untuk segera memeriksa tugas anda.</h3>
                        @elseif($submission->is_checked == true && $submission->is_accepted == false)
                            <p>
                                <b><i class="fas fa-exclamation-triangle" aria-hidden="true"></i> Tugas anda
                                    DITOLAK!</b><br>
                            </p>
                            <p class="text-muted">
                                Bacalah catatan, dan minta tugas anda diperiksa ulang. <br>
                                Pemeriksa: {{$reviewer->name}} <br>
                            </p>
                        @else
                            <h3>Tugas kamu sudah diperiksa!</h3>
                            <p class="text-muted">
                                Pemeriksa: {{$reviewer->name}} <br>
                                Perolehan skor: {{$submission->score_achieved}} / {{$submission->exercises->max_score}}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-3 col-md-7 col-xs-12">
                <div class="card">
                    <div class="card-header">Catatan dari pemeriksa</div>
                    <div class="card-body">
                        @if($submission->is_checked == false && $submission->is_accepted == false)
                            <h3>Pengurus belum memeriksa tugas anda. Coba di ping biar diperiksa h3h3h3</h3>
                        @elseif($submission->is_checked == true && $submission->is_accepted == false)
                            <div class="alert alert-warning"><b>Info:</b> catatan ini mohon dibaca agar kedepannya dapat
                                menjadi lebih baik!
                            </div> <br>
                            {!! $submission->notes !!}
                        @else
                            <div class="alert alert-warning"><b>Info:</b> catatan ini mohon dibaca agar kedepannya dapat
                                menjadi lebih baik!
                            </div> <br>
                            {!! $submission->notes !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
