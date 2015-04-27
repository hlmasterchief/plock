@extends('template.profile')

@section('menu-content')

<div class="posts-list">

<div class="thumbnails">
<div class="row">

    @foreach ($bookmarks as $bookmark)
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="thumbnail transition">
        <div class="thumbnail-wrap">

            <div class="thumbnail-img transition">
                <img class="img-responsive transition" src="http://www.oamk.fi/english/info/schools/business/images/ulkokuva19_800x533.jpg">
            </div>

            <div class="thumbnail-a"><a href="/bookmark/{{ $bookmark->id }}"></a></div>

            <div class="caption">
                <h4>{{ $bookmark->favourite->name }}</h4>
                @if ($bookmark->favourite->type == 'movie')
                <p>{{ $bookmark->favourite->data->director }}</p>
                @endif
            </div>

            <div class="thumbnail-meta">
                <ul class="row">
                    <li class="col-md-3 col-sm-3 col-xs-3 like"><a href="#"><span class="glyphicon glyphicon-heart"></span><span>15</span></a></li>
                    <li class="col-md-3 col-sm-3 col-xs-3 comment"><a href="/bookmark/{{ $bookmark->id }}"><span class="glyphicon glyphicon-comment"></span><span> {{ $bookmark->comments->count() }}</span></a></li>
                    <li class="col-md-3 col-sm-3 col-xs-3 sharing"><a href=""><span class="glyphicon glyphicon-lock"></span><span> 15</span></a></li>
                    <li class="col-md-3 col-sm-3 col-xs-3 report text-right"><a href=""><span class="glyphicon glyphicon-cog"></span></a></li>
                </ul>
            </div>

        </div>
        </div>
    </div>
    @endforeach

</div>

</div><!-- /.posts-list -->

@stop