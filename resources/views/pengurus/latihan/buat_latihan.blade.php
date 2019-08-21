@extends('layouts.app')
@section('stylesheet')
<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
@endsection
@section('content')
    <div class="container">
       <div class="row justify-content-center">
           <div class="col-9">

                <div class="card">
                        <div class="card-header">Buat Latihan</div>
                        <div class="card-body">
                            <div class="alert alert-warning"><b>Perhatian!</b> buat latihan sesuai dengan materi yang akan diajarkan di pertemuan!</div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <p><b>Tunggu!</b> Ada beberapa error di validasi:</p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                @csrf
                                <div class="mt-2">
                                    <label for="exc_title">Judul latihan</label>
                                    <input required class="form-control" type="text" name="exc_title" id="exc_title" placeholder="Masukkan judul latihannya disini!">
                                </div>
                                <div class="mt-4">
                                        <label for="exc_desc">Deskripsi latihan</label>
                                        <textarea required name="exc_desc" class="form-control" id="exc_desc" cols="30" rows="10"></textarea>
                                </div>
                                <div class="mt-4">
                                    <label for="exc_pts">Maks Poin</label> <br>
                                    <small class="text-muted">Poin terbesar yang diperbolehkan adalah 100.</small>
                                    <input required type="text" class="form-control" placeholder="masukkan maks poin" id="exc_pts" name="exc_pts">
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary" onclick="sendAJAX()">Buat latihan</button>
                                </div>
                        </div>
                    </div>

           </div>
       </div>
    </div>
@endsection
@section('scripts')
    <script>

        CKEDITOR.replace("exc_desc");

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        function sendAJAX() {
            $.ajax({
                type: 'POST',
                // make sure you respect the same origin policy with this url:
                // http://en.wikipedia.org/wiki/Same_origin_policy
                url: '{{route('apiv0.latihan.simpan')}}',
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'user' : '{{Auth::user()->id}}',
                    'judul' : $('input[name="exc_title"]').val(),
                    'deskripsi' : CKEDITOR.instances['exc_desc'].getData(),
                    'maks_poin' : $('input[name="exc_pts"]').val()
                },
                success: function(msg){
                    Swal.fire({
                        title: 'Mantul bosque!' ,
                        text: `Berhasil membuat latihan dengan judul "${msg.data.judul}"`,
                        type: 'success',
                        confirmButtonText: 'Lanjutkeun'
                    });
                },

                error: function (msg) {
                    var listError;
                    listError = "";
                    for (var key in JSON.parse(msg.responseText).errors) {
                        listError += `<b>${key}</b>: ${JSON.parse(msg.responseText).errors[key]}<br>`;
                    }
                    Swal.fire({
                        title: 'Error anjir!' ,
                        html: `<p>Terdapat error: ${JSON.parse(msg.responseText).message}! <br><br> ${listError}  </p>`,
                        type: 'error',
                        confirmButtonText: 'Ulang lagi'
                    })
                }
            });
        }
    </script>
@endsection
