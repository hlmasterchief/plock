<div class="container-fluid">

<nav class="row main-navbar" role="navigation">
    <div class="col-md-3 col-sm-3 col-xs-4">
        <div class="navbar-wrap">
            <a href="/{{ Auth::user()->username }}" class="logo">
                <h4>{{ Auth::user()->displayName() }}</h4>
            </a>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 text-center">
    @if (isset($header))
        <div class="navbar-wrap">
            <div class="heading">
                <div class="heading-title">
                <h4 class="title">{{ $header['title'] }}</h4>
                <p class="sub-title">Created by <a href="/{{ $header['username'] }}">{{ $header['display_name'] }}</a></p>
                </div>

                <div class="buttonLockEdit">
                    @if (Auth::user()->profile->id == $header['user_id'])
                    <abbr title="Edit"><a href="#" id="edit{{ ucfirst($header['type']) }}"><span class="glyphicon glyphicon-edit"></span></a></abbr>
                    @elseif ($header['type'] == 'bookmark')
                    <abbr title="Lock it"><a href="#" id="addPost" value="{{ $bookmark->id }}"><span class="glyphicon glyphicon-lock"></span></a></abbr>
                    @else
                    <abbr title="Lock it"><a href="#"><span class="glyphicon glyphicon-heart"></span></a></abbr>
                    @endif
                </div>
            </div>
        </div>
    @endif
    </div>
    <div class="navbar-right text-right">
        <div class="navbar-wrap">
            <div class="input-icon search">
                <label for="search" id="search-icon"><span class="glyphicon glyphicon-search"></span></label>
                <input type="text" id="search" placeholder="Search" name="search">
            </div>
            <div class="setting">
                <div class="dropdown">
                    <div data-toggle="dropdown" class="dropdown-toggle">
                        <button type="button" class="setting-button" data-toggle="dropdown"><span class="glyphicon glyphicon-menu-hamburger"></span>
                        </button>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a href="/home">Home page</a></li>
                        <li><a href="/{{ Auth::user()->username }}">{{ Auth::user()->displayName() }}</a></li>
                        <li class="divider"></li>
                        <li><a href="/update">Edit account</a></li>
                        <li><a href="/profile/update">Edit profile</a></li>
                        <li><a href="/logout">Log out</a></li>
                        <li class="divider"></li>
                        <li>Help</li>
                        <li>Term & Privacy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav> <!-- /.navigation -->

</div>
@if (isset($header))
@include($header['type'].'.update')
    @if ($header['type'] == 'bookmark')
        @include('bookmark.save')
    @endif
@endif
