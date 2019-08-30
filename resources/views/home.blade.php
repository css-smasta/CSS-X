@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="mr-4">
                <div class="avatar avatar-xl">
                    @if(Auth::user()->is_avatar_set == false)
                        <img src="{{asset('img/noavatar.png')}}" alt="{{Auth::user()->name}} belum mengatur avatar nya"
                             class="avatar-img rounded-circle">
                        @else
                        <img src="{{asset('storage/a/avatars/' . Auth::user()->id)}}" alt="Avatar {{Auth::user()->name}}"
                             class="avatar-img rounded-circle">
                    @endif
                </div>
            </div>
            <div class="p-2">
                <h3 style="margin-bottom: 0px;">{{__('dashboard.welcome')}}</h3>
                <h1 style="margin-bottom: 0px;">
                    {{Auth::user()->name}}
                    @if (Auth::user()->role_lvl == 2)
                        <i class="fas fa-check-circle" style="color: #00d97e"></i>
                    @elseif(Auth::user()->role_lvl == 3)
                        <i class="fas fa-tools" style="color: #e63757"></i>

                    @else
                        <i class="fas fa-check-circle" style="color: #6e84a3"></i>
                    @endif
                </h1>
                <p style="margin-bottom: 0px;">
                    @if (Auth::user()->role_lvl == 2)
                        {{__('dashboard.ranks.manager')}}
                    @elseif(Auth::user()->role_lvl == 3)
                        {{__('dashboard.ranks.admin')}}
                    @else
                        {{__('dashboard.ranks.member')}}
                    @endif
                </p>
            </div>
        </div>
        <hr>
        <div>
            <a href="/pengurus/dashboard" class="btn btn-white mr-2 mt-3">
                <span class="fas fa-address-card"></span>
                {{__('dashboard.main_page_btn.manager_dashboard')}}
            </a>
            <a href="#" class="btn btn-white mr-2 mt-3">
                <span class="fas fa-globe-asia"></span>
                {{__('dashboard.main_page_btn.profile_page')}}
            </a>
            <a href="#" class="btn btn-white mr-2 mt-3">
                <span class="fas fa-user-edit"></span>
                {{__('dashboard.main_page_btn.account_settings')}}
            </a>
            <a href="#" class="btn btn-white mr-2 mt-3">
                <span class="fas fa-users"></span>
                {{__('dashboard.main_page_btn.member_list')}}
            </a>
        </div>
        <div class="row mt-3">
            <div class="mb-3 col-md-6 col-xs-12">
                <div class="card-deck">
                    @include('layouts.snippets.card', [
                        'card_icon' => 'fas fa-star',
                        'card_text' => __('dashboard.main_page_cards.your_score'),
                        'card_body' => $score
                    ])

                    @include('layouts.snippets.card', [
                        'card_icon' => 'fas fa-chart-line',
                        'card_text' =>  __('dashboard.main_page_cards.your_ranks'),
                        'card_body' => '1'
                    ])

                    @include('layouts.snippets.card', [
                        'card_icon' => 'fas fa-user',
                        'card_text' => __('dashboard.main_page_cards.your_management'),
                        'card_body' => Auth::user()->role_lvl > 2 ? __('dashboard.ranks.manager') : __('dashboard.ranks.member')
                    ])

                </div>
            </div>
            <div class="mb-3 col-md-6 col-xs-12">
                <div class="card-deck" style="height: 100%;">
                    @include('layouts.snippets.card', [
                        'card_icon' => 'fas fa-chart-line',
                        'card_text' => __('dashboard.main_page_cards.tasks.done'),
                        'card_body' => $done_proj
                    ])
                    @include('layouts.snippets.card', [
                        'card_icon' => 'fas fa-chart-line',
                        'card_text' => __('dashboard.main_page_cards.tasks.unreviewed'),
                        'card_body' => $pending_count
                    ])
                    @include('layouts.snippets.card', [
                       'card_icon' => 'fas fa-chart-line',
                       'card_text' => __('dashboard.main_page_cards.tasks.reviewed'),
                       'card_body' => $reviewed_s
                   ])
                </div>

            </div>
        </div>

        <div class="row mt-4">

            <div class="col-md-6 col-xs-12">
                <div class="card">
                    <div class="card-header">{{__('dashboard.all_task')}}</div>
                    <div class="card-body">
                        <ul>
                            @foreach ($task as $ts)
                                @if(!is_null(\App\Submission::where('user_id', Auth::user()->id)->where('course_id', $ts->id)->first()))
                                    @if($ts->id !== \App\Submission::where('user_id', Auth::user()->id)->where('course_id', $ts->id)->first()->course_id)
                                        <li><a href="home/latihan/{{$ts->id}}">{{ $ts->exercise_name}}</a></li>
                                    @endif
                                    @else
                                    <li><a href="home/latihan/{{$ts->id}}">{{ $ts->exercise_name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xs-12">
                <div class="card">
                    <div class="card-header">{{__('dashboard.main_page_cards.tasks.reviewed')}}</div>
                    <div class="card-body">
                        <div class="list-group">

                            @foreach ($reviewed as $rw)
                                <a href="/home/submisi/{{$rw->id}}"
                                   class="list-group-item list-group-item-action">{{ $rw->exercises->exercise_name }}</a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 col-xs-12">
                <div class="card card-inactive">
                    <div class="card-header">{{__('dashboard.main_page_cards.tasks.unreviewed')}}</div>

                    <div class="card-body">

                        <div class="list-group">
                            @foreach ($pendingsub as $ps)
                                <a href="/home/submisi/{{$ps->id}}"
                                   class="list-group-item list-group-item-action">{{ $ps->exercises->exercise_name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="card card-inactive">
                    <div class="card-header">{{__('dashboard.main_page_cards.tasks.failed')}}</div>
                    <div class="card-body">
                        @foreach($failed_task as $ft)
                            <a href="/home/submisi/{{$ft->id}}"
                               class="list-group-item list-group-item-action">{{ $ft->exercises->exercise_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        @if (session('status'))
        Swal.fire({
            title: "Informasi" ,
            html: "{{session('status')}}",
            type: "success",
            confirmButtonText: 'Oke'
        })
        @endif
    </script>
@endsection
