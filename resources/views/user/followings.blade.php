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
                        {{-- follow/unfollow --}}
                        @if ($following->id != Auth::id())
                            {!! Form::open(array('url'=>'/follow/toggle', 'autocomplete' => 'off')) !!}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="follower_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="followee_id" value="{{ $following->id }}">
                            @if (Auth::user()->isFollow($following->id))
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