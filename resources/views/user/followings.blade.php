@extends('template.profile')

@section('menu-content')

<div class="followings">
    <div class="panel panel-default">
        <div class="panel-body">

        <div class="row">

            @foreach ($followings as $following)
            <div class="col-md-6 col-sm-6">
                <div class="panel panel-default">

                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="/{{ $following->username }}">
                            <div class="crop-64"><img class="media-object" src="{{ $following->profile->avatar }}"></div>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $following->displayName() }}</h4>
                            <p>{{ $following->profile->location }}</p>
                        </div>
                    </div>
                    <div class="follow-button">
                        <a href="/follow/toggle">
                        {{-- follow/unfollow --}}
                        <button class="btn btn-primary">Follow</button></a>
                    </div>
                </div>

                </div>
            </div>
            @endforeach

        </div>

        </div>
    </div>
</div>

@stop