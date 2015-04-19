@extends('layout.master')

@section('page')

{{-- navagation --}}
<div class="container-fluid">

<nav class="row main-navbar" role="navigation">
    <div class="col-md-3 col-xs-5">
        <div class="navbar-wrap">
            <a href="{{ url("/home") }}" class="logo">Clever Croblmask</a>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 text-center">
        <div class="navbar-wrap">
            <div class="heading">
                {{-- <h4 class="title"><a href="/home">Box content</a></h4>
                <p class="sub-title">Created by <a href="/home">CroblMask</a></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-1 text-right">
        <div class="navbar-wrap">
            <div class="search">
                <span class="glyphicon glyphicon-search"></span>
            </div>
        </div>
    </div>
</nav> <!-- /.navigation -->

</div>

{{-- home-content --}}
<div class="home">

<div class="cover-photo">
    <div class="row cover-wrap">
    <div class="container">
        <div class="col-md-2 col-xs-2 profile-img">
            <img src="">
        </div>

        <div class="col-md-4 col-xs-4 profile-info">
            <h2>Clever Croblmask</h2>
            <div class="profile-location">
                <span class="glyphicon glyphicon-map-marker"></span>
                <span>Oulu, Finland</span>
            </div>
            <div class="profile-start-date">
                <span class="glyphicon glyphicon-time"></span>
                <span>Join on May, 2013</span>
            </div>
        </div>
    </div>
    </div>
</div> <!-- /.cover-photo -->

{{-- menu horizontal --}}
<div class="row profile-menu-horizontal">
    <div class="container">

        <div class="col-md-2 col-xs-2"></div>

        <div class="col-md-2 col-xs-2 text-center">
            <div class="tmenu-wrap">
            <a class="tmenu-middle" href="/box">
                <h5 class="menu-name">Boxs</h5>
                <p class="menu-data">23</p>
            </a>
            </div>
        </div>

        <div class="col-md-2 col-xs-2 text-center">
            <div class="tmenu-wrap">
            <a class="tmenu-middle" href="/box">
                <h5 class="menu-name">Posts</h5>
                <p class="menu-data">78</p>
            </a>
            </div>
        </div>

        <div class="col-md-2 col-xs-2 text-center">
            <div class="tmenu-wrap">
            <a class="tmenu-middle" href="/box">
                <h5 class="menu-name">Followers</h5>
                <p class="menu-data">40</p>
            </a>
            </div>
        </div>

        <div class="col-md-2 col-xs-2 text-center">
            <div class="tmenu-wrap">
            <a class="tmenu-middle" href="/box">
                <h5 class="menu-name">Followings</h5>
                <p class="menu-data">40</p>
            </a>
            </div>
        </div>

        <div class="col-md-2 col-xs-2"></div>

    </div>
</div><!-- /.menu-horizontal -->

{{-- boxs-list.html --}}
@yield('home-content', '')

</div><!-- /home -->
@stop

