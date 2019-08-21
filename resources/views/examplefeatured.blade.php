@extends('layouts.empty')
@section('stylesheet')
<style>
    /* centered columns styles */
    .row-centered {
        text-align: center;
    }

    .col-centered {
        display: inline-block;
        float: none;
        /* reset the text-align */
        text-align: left;
        /* inline-block space fix */
        margin-right: -4px;
        text-align: center;
    }

</style>
@endsection
@section('content')
<div class="container">

    <div class="row row-centered">
        <div class="mt-5 col-12 col-centered">
            <img width="200" height="200" src="https://images.emojiterra.com/mozilla/512px/1f389.png" alt="">
        </div>
        <div class="mt-3 col-12 col-centered">
            <h1>Selamat datang di homepage nya {{$user->name}}!</h1>
        </div>
        <div class="col-12 col-centered">
            <p>
                Dia belum menambahkan konten apapun di homepagenya, jadi tampilannya seperti ini! <br>
                Berikut adalah sedikit info tentang dia supaya laman ini terisi <i class="fas fa-grin-squint-tears"></i>
                <br>
            </p>
        </div>
        <div class="col-12 col-centered">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Info</th>
                        <th scope="col">Isi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Nama</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Kelas</td>
                        <td>{{$user->class}}</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Absen</td>
                        <td>{{$user->css_number}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-centered">
            <p>Bila di profil kalian tampilannya juga masih seperti ini, bisa kalian edit di <code>edit profil</code></p>
        </div>
    </div>
</div>
@endsection
