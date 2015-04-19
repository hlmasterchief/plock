@extends('layout.master')

@section('page')

<div class="welcome">

<header>
    <ul class="nav nav-pills">
        <li class="active"><a href="#">Log in</a></li>
        <li><a href="#">Sign up</a></li>
    </ul>
</header>

<div class="menu-right">
    <ol class="">
        <li class="btn btn-default btn-circle btn-block"></li>
        <li class="btn btn-default btn-circle btn-block"></li>
        <li class="btn btn-default btn-circle btn-block"></li>
    </ol>
</div>

<div class="fullpage">
<!-- Log in/Sign up -->
<section class="section-1" style="background-color: red;">
    <div class="content">

        <div id="page-logo">
            <a href="{{ url("/") }}">Plock</a>
        </div>

        <!-- if default, to register a new account -->
        @include('authentication.signup')
        <!-- if log in the system -->
        @include('authentication.login')

        <div class="scroll-down">
            <span class="scroll-arrow">
                <div class="arrow"></div>
            </span>
            <span>Explore</span>
        </div>
    </div>
</section><!-- /.section-1 -->

<!-- Overview main functions -->
<section class="section-2">
    <div class="content">

        <div class="overview-img"></div>
        <div class="overview-text">
            <div class="title"></div>
            <div class="description">
                <p>Plock kept your interested as a unique exhibition for sharing with family and friends.</p>
            </div>
        </div>

    </div>
</section><!-- /.section-2 -->

<!-- How it works, instruction video -->
<section class="section-3">
    <div class="content">

        <div class="overview-img"></div>
        <div class="overview-text">
            <div class="title"></div>
            <div class="description">
                <p>Plock kept your interested as a unique exhibition for sharing with family and friends.</p>
            </div>
        </div>

    </div>
</section><!-- /.section-3 -->

<!-- footer -->
<footer>
<ul class="menu">
    <li><a href="#">Term</a></li>
    <li><a href="#">Privacy</a></li>
    <li><a href="#">Contact</a></li>
    <li class="copy-right">© Plock sites. All rights reserved.</li>
</ul>
</footer><!-- /footer -->

</div><!-- /.full-page -->

</div>
@stop