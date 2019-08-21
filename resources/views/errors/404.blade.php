@extends('layouts.empty')

@section('content')
   <div class="mt-4 mb-4"><br></div>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <div class="d-flex justify-content-center"><img height="300" width="320" src="https://dashkit.goodthemes.co/assets/img/illustrations/lost.svg" alt=""></div>
                <br>
                <div class="d-flex justify-content-center"><h1 style="font-size:40px;">404 <i class="fas fa-sad-tear"></i></h1></div>
            </div>
            <div class="col-md-7 col-sm-12">
                <h1>Ada seorang penjelajah website yang gagal <br>menemui destinasi nya :(</h1>
                <p>Beberapa kemungkinan penyebab:</p>
                <ul>
                    <li>Halaman nya sudah dihapus</li>
                    <li>Halaman sudah dipindah</li>
                    <li>Link typo (cek url nya dong)</li>
                    <li>Sengaja kesini</li>
                    <li><s>Anda gblk</s></li>
                </ul>
                <p>Bila ini sebuah ketidaksengajaan, anda bisa balik ke tujuan sebelumnya.</p>
                <a class="btn btn-outline-secondary mb-2" href="{{ URL::previous() }}">Balik ke halaman sebelumya, biar ga error bos <i class="fas fa-grin-squint-tears"></i></a>
                <a class="btn btn-outline-secondary mb-2" href="/home"><i class="fas fa-home"></i> Balik ke beranda</a>
            </div>
        </div>
    </div>
@endsection