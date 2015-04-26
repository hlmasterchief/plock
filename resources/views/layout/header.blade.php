<div class="container-fluid">

<nav class="row main-navbar" role="navigation">
    <div class="col-md-3 col-xs-5">
        <div class="navbar-wrap">
            <a href="{{ url("/profile/".Auth::user()->id) }}" class="logo"><h4>{{ Auth::user()->username }}</h4></a>
        </div>
    </div>

    <div class="col-md-6 col-xs-6 text-center">
    @if (isset($header))
        <div class="navbar-wrap">
            <div class="heading">
                <h4 class="title">{{ $header['title'] }}</h4>
                <p class="sub-title">Created by <a href="/home">{{ $header['sub-title'] }}</a></p>
            </div>
        </div>
    @endif
    </div>

    <div class="col-md-3 col-xs-1 text-right">
        <div class="navbar-wrap">
            <div class="search">
                <span class="glyphicon glyphicon-search"></span>
                <input type="text" placeholder="Search">
            </div>
            <div class="setting">
                <span class="glyphicon glyphicon-option-vertical"></span>
            </div>
        </div>
    </div>
</nav> <!-- /.navigation -->

</div>