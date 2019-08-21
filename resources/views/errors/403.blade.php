@extends('layouts.empty')

@section('content')
    <div class="mt-4 mb-4"><br></div>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <div class="d-flex justify-content-center"><img height="300" width="320" src="{{asset('img/403.png')}}" alt=""></div>
                <br>
                <div class="d-flex justify-content-center"><h1 style="font-size:40px;">403 <i class="fas fa-angry"></i></h1></div>
            </div>
            <div class="col-md-7 col-sm-12">
               <h1>Anda tidak seharusnya disini.</h1>
                <p>Error: </p>
                <div class="alert alert-danger">
                    <h3 style="margin-bottom: 0px;"><b><i class="fas fa-exclamation-triangle"></i> ERROR:</b></h3>
                    <h4 style="font-family: monospace; margin-bottom: 0px;"> {!!$exception->getMessage()!!}</h4>
                   </div>
                <p>
                    Bila ini sebuah ketidaksengajaan, anda bisa balik ke tujuan sebelumnya. <br>
                    Bila ini adalah kesalahan sistem, hubungi admin di admin@css_smasta.tech
                </p>
                <a class="btn btn-outline-secondary mb-2" href="{{ URL::previous() }}">Balik ke halaman sebelumya, biar ga error bos <i class="fas fa-grin-squint-tears"></i></a>
                <a class="btn btn-outline-secondary mb-2" href="/home"><i class="fas fa-home"></i> Balik ke beranda</a>
            </div>
        </div>
    </div>
@endsection
