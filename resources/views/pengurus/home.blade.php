@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-1 mr-5 pr-5">
            <img width="100" height="100" src="{{asset('img/Elearning-CSSX-White.svg')}}" alt="">
        </div>
        <div class="col-10">
            <h1>Selamat datang, Pengurus CSS!</h1>
            <p>Manfaatkan Aplikasi CSS-X sebagai pengurus disini!</p>
        </div>
    </div>
    <hr>
    <div class="mb-4">
        <div class="d-flex justify-content-start flex-row">
            <div class="pr-4">
                <a href="/pengurus/latihan/buat" class="btn-block btn btn-white btn-lg mr-2">
                    <i class="fas fa-pen"></i> <br>
                    Buat Latihan
                </a>
            </div>
            <div class="pr-4">
                <a href="/pengurus/latihan/buat" class="btn-block btn btn-white btn-lg mr-2">
                    <i class="fas fa-list"></i> <br>
                    List latihan
                </a>
            </div>
            <div class="pr-4">
                <a href="/pengurus/latihan/review" class="btn-block btn btn-white btn-lg mr-2">
                    <i class="fas fa-glasses"></i> <br>
                    Review Submisi
                </a>
            </div>
            <div class="pr-4">
                <a href="/pengurus/rekap-poin" class="btn-block btn btn-white btn-lg mr-2">
                    <i class="fas fa-file-excel"></i> <br>
                    Rekap Poin
                </a>
            </div>
            <div class="pr-4">
                <a href="/pengurus/arsip/latihan" class="btn-block btn btn-white btn-lg mr-2">
                    <i class="fas fa-archive"></i> <br>
                    Arsip Latihan
                </a>
            </div>
            <div class="pr-4">
                <a href="/pengurus/arsip/submisi" class="btn-block btn btn-white btn-lg mr-2">
                    <i class="fas fa-file-upload"></i> <br>
                    Arsip Submisi
                </a>
            </div>
            <div class="pr-4">
                <a href="/pengurus/verifikasi-user" class="btn-block btn btn-white btn-lg mr-2">
                    <i class="fas fa-user-check"></i> <br>
                    Verifikasi User
                </a>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="d-flex justify-content-start flex-row">
            <div class="pr-4">
                <a href="/pengurus/tutup-latihan" class="btn-block btn btn-white btn-lg mr-2">
                    <i class="fas fa-folder-minus"></i> <br>
                    Tutup latihan
                </a>
            </div>
            <div class="pr-4">
                <a href="/pengurus/buat/pengumuman" class="btn btn-block btn-white btn-lg mr-2">
                    <i class="fas fa-bullhorn"></i> <br>
                    Buat pengumuman
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6">

            <div class="card-deck">

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Belum di Verifikasi
                                </h6>

                                <span class="h2 mb-0">
                                    {{$notverified}}
                                </span>


                            </div>
                            <div class="col-auto">

                                <span class="h2 fas fa-user-times text-muted mb-0"></span>

                            </div>
                        </div>

                    </div>
                </div>



                <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                        Total Anggota
                                    </h6>

                                    <span class="h2 mb-0">
                                        {{$totaluser}}
                                    </span>


                                </div>
                                <div class="col-auto">

                                    <span class="h2 fas fa-user text-muted mb-0"></span>

                                </div>
                            </div>

                        </div>
                    </div>



            </div>

        </div>
        <div class="col-sm-12 col-md-6">


            <div class="card-deck">

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Total tugas
                                </h6>

                                <span class="h2 mb-0">
                                    {{$alltask}}
                                </span>


                            </div>
                            <div class="col-auto">

                                <span class="h2 fas fa-clipboard-list text-muted mb-0"></span>

                            </div>
                        </div>

                    </div>
                </div>



                <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                       Belum Diperiksa
                                    </h6>

                                    <span class="h2 mb-0">
                                        {{$notchecked}}
                                    </span>


                                </div>
                                <div class="col-auto">

                                    <span class="h2 fas fa-clipboard-check text-muted mb-0"></span>

                                </div>
                            </div>

                        </div>
                    </div>



            </div>



        </div>
    </div>

</div>
@endsection
