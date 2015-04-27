@extends('layout.master')

@section('page')

{{-- navagation --}}
@include('layout.header')

{{-- home-content --}}
<div class="profile">

<div class="cover-photo">
    <div class="row cover-wrap">
    <div class="container">

        <div class="col-md-2 col-xs-2 profile-img">
            <img src="" class="img-circle img-responsive">
        </div>

        <div class="col-md-10 col-xs-8 profile-info">
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

        <div class="col-md-2 col-xs-2 text-center row">
            <div class="col-md-10 col-sm-10 col-xs-12 tmenu-wrap ">
            <a class="tmenu-middle" href="/posts-list">
                <h5 class="menu-name">Posts</h5>
                <p class="menu-data">78</p>
            </a>
            </div>
        </div>

        <div class="col-md-2 col-xs-2 text-center row">
            <div class="col-md-10 col-sm-10 col-xs-12 tmenu-wrap ">
            <a class="tmenu-middle" href="/boxs-list">
                <h5 class="menu-name">Boxs</h5>
                <p class="menu-data">23</p>
            </a>
            </div>
        </div>

        <div class="col-md-2 col-xs-2 text-center row">
            <div class="col-md-10 col-sm-10 col-xs-12 tmenu-wrap">
            <a class="tmenu-middle" href="/followers">
                <h5 class="menu-name">Followers</h5>
                <p class="menu-data">40</p>
            </a>
            </div>
        </div>

        <div class="col-md-2 col-xs-2 text-center row">
            <div class="col-md-10 col-sm-10 col-xs-12 tmenu-wrap">
            <a class="tmenu-middle" href="/followings">
                <h5 class="menu-name">Followings</h5>
                <p class="menu-data">40</p>
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

