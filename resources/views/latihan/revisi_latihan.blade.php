@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-2">
            <a href="/home" class="btn btn-primary">Kembali ke dashboard</a>
        </div>

        <div class="card">
            <div class="card-header">
                Revisi latihan
            </div>
            <div class="card-body">
                <p>Silahkan upload tugas anda yang sudah di revisi.</p>
                <div class="card card-inactive">
                    <form action="" method="POST" style="margin:20px;" enctype="multipart/form-data">
                        @csrf
                        <label for="course_fileupload">Upload tugas anda</label> <br>
                        <input  type="file" name="course_file" id="course_fileupload" accept=".html,.jpg,.jpeg,.png"><br><br>
                        <p>Maksimal ukuran file: 2 Megabyte. <b>Lebih dari itu akan error.</b></p>
                        <input type="hidden" name="_method" value="PUT">
                        <button type="submit" class="btn btn-success">Upload tugas!</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    @if ($errors->any())
        <script>
            Swal.fire({
                title: "Error anjir!",
                html: "<p>" +
                    @foreach($errors->all() as $error)
                        "{{$error}}" +
                    @endforeach
                        "</p>",
                type: "error"
            });
        </script>
    @endif
@endsection
