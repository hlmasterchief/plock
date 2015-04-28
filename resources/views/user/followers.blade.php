@extends('template.profile')

@section('menu-content')

<div class="followers">
    <div class="panel panel-default">
        <div class="panel-body">

        <div class="row">

            @foreach ($followers as $follower)
            <div class="col-md-6 col-sm-6">
                <div class="panel panel-default">

                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="/{{ $follower->username }}">
                            <div class="crop-64"><img class="media-object" src="{{ $follower->profile->avatar }}"></div>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $follower->displayName() }}</h4>
                            <p>{{ $follower->profile->location }}</p>
                        </div>
                    </div>
                    <div class="follow-button">
                        {{-- follow/unfollow --}}
                        @if ($follower->id != Auth::id())
                            {!! Form::open(array('url'=>'/follow/toggle', 'autocomplete' => 'off')) !!}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="follower_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="followee_id" value="{{ $follower->id }}">
                            @if (Auth::user()->isFollow($follower->id))
                            <button type="submit" class="btn btn-primary">Unfollow</button>
                            @else
                            <button type="submit" class="btn btn-primary">Follow</button>
                            @endif
                            {!! Form::close() !!}
                        @endif
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