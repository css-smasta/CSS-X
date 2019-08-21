@extends('layouts.app')

@section('content')
<div class="container">


    <div class="header">
        @if ($profile->cover_img == "/img/mountains.png")
            <img src="{{asset('/img/mountains.png')}}" class="header-img-top" alt="sepertinya {{$profile->name}} belum mengganti sampul gambarnya">
        @else
            
        @endif
        <div class="container-fluid">

            <div class="header-body mt-n5 mt-md-n6">
                <div class="row align-items-end">
                    <div class="col-auto">

                        <div class="avatar avatar-xxl header-avatar-top">
                            @if ($profile->avatar_url == "/img/noavatar.png")
                                <img src="{{asset($profile->avatar_url)}}" alt="..."
                                class="avatar-img rounded-circle border border-4 border-card">
                            @else
                            <img src="{{asset('/storage/useravatar/'.$profile->avatar_url)}}" alt="..."
                            class="avatar-img rounded-circle border border-4 border-card">
                            @endif
                        </div>

                    </div>
                    <div class="col mb-3 ml-n3 ml-md-n2">

                        <h6 class="header-pretitle">
                            @if ($profile->role_lvl == 2)
                            PENGURUS
                            @else
                            ANGGOTA
                            @endif
                        </h6>

                        <h1 class="header-title">
                            {{$profile->name}}
                            @if ($profile->role_lvl == 2)
                            <i class="fas fa-check-circle" style="color: #00d97e"></i>
                            @else
                            <i class="fas fa-check-circle" style="color: #6e84a3"></i>
                            @endif
                        </h1>

                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col">

                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="/home/anggota/{{$profile->id}}" class="nav-link">
                                    Homepage
                                </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link active">
                                    File di upload
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-deck">
        
    </div>

</div> 
@endsection