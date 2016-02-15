@extends('layout.master')

@section('page')

{{-- navagation --}}
@include('layout.header')

{{-- home-content --}}
<div class="profile">

<div class="cover-photo" style="background-image: url('{{ $user->profile->cover }}');">
    <div class="row cover-wrap">
    <div class="container">

        <div class="col-md-2 col-xs-2 profile-img">
            <img src="{{ $user->profile->avatar }}" class="img-circle img-responsive">
        </div>
        {{-- {{ $user->profile->avatar }} --}}

        <div class="col-md-10 col-xs-8 profile-info">
            <div class="displayname">
                <h2>{{ $user->displayName() }}</h2>
                {{-- if follow/unfollow --}}
                @if ($user->id != Auth::id())
                    {!! Form::open(array('url'=>'/follow/toggle', 'autocomplete' => 'off')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="follower_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="followee_id" value="{{ $user->id }}">
                    @if (Auth::user()->isFollow($user->id))
                    <button type="submit" class="btn follow-button transition">Unfollow</button>
                    @else
                    <button type="submit" class="btn follow-button transition">Follow</button>
                    @endif
                    {!! Form::close() !!}
                @endif
            </div>
            <div class="profile-location">
                <span class="glyphicon glyphicon-map-marker"></span>
                <span> {{ $user->profile->location }}</span>
            </div>
            <div class="profile-website">
                {{-- example hoempage address: abc.com --}}
                <a href="http://{{ $user->profile->homepage }}">
                    <span class="glyphicon glyphicon-home"></span>
                    <span>{{ $user->profile->homepage }}</span>
                </a>
                {{-- end example --}}
            </div>
            <div class="profile-description">
                <span> {{ '"'.$user->profile->description.'"' }}</span>
            </div>
            {{-- <div class="profile-start-date">
                <span class="glyphicon glyphicon-time"></span>
                <span>Join on {{ $user->created_at }}</span>
            </div> --}}
        </div>

    </div>
    </div>
</div> <!-- /.cover-photo -->

{{-- menu horizontal --}}
<div class="row profile-menu-horizontal">
    <div class="container">

        <div class="col-md-2 col-xs-2"></div>

        <div class="col-md-2 col-xs-2 text-center row">
            <div class="col-md-10 col-sm-10 col-xs-12 tmenu-wrap ">
            <a class="tmenu-middle" href="/{{ $user->username }}">
                <h5 class="menu-name">Bookmarks</h5>
                <p class="menu-data">{{ $user->bookmarks->count() }}</p>
            </a>
            </div>
        </div>

        <div class="col-md-2 col-xs-2 text-center row">
            <div class="col-md-10 col-sm-10 col-xs-12 tmenu-wrap ">
            <a class="tmenu-middle" href="/{{ $user->username }}/boxes">
                <h5 class="menu-name">Boxs</h5>
                <p class="menu-data">{{ $user->boxes->count() }}</p>
            </a>
            </div>
        </div>

        <div class="col-md-2 col-xs-2 text-center row">
            <div class="col-md-10 col-sm-10 col-xs-12 tmenu-wrap">
            <a class="tmenu-middle" href="/{{ $user->username }}/followers">
                <h5 class="menu-name">Followers</h5>
                <p class="menu-data">{{ $user->followers->count() }}</p>
            </a>
            </div>
        </div>

        <div class="col-md-2 col-xs-2 text-center row">
            <div class="col-md-10 col-sm-10 col-xs-12 tmenu-wrap">
            <a class="tmenu-middle" href="/{{ $user->username }}/followings">
                <h5 class="menu-name">Followings</h5>
                <p class="menu-data">{{ $user->following->count() }}</p>
            </a>
            </div>
        </div>

        <div class="col-md-2 col-xs-2"></div>

    </div>
</div><!-- /.menu-horizontal -->

{{-- boxs-list.html --}}
<div class="container">
@yield('menu-content', '')
</div>

</div><!-- /home -->


{{-- fixed create-button --}}
@include('layout.create-button')

@stop

