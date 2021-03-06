@extends('template.template')

@section('main-content')
<div class="box">

    <div class="description">
        <div class="row">

            <div class="col-md-2 col-sm-2"></div>

            <div class="col-md-8 col-sm-8">
                <blockquote class="panel panel-default">
                    <p class="panel-body">{{ $box->description }}</p>
                    <footer>{{ $box->created_at }}</footer>
                </blockquote>

            </div>

            <div class="col-md-2 col-sm-2"></div>

        </div>
    </div>

    <div class="thumbnails">
    <div class="row">

        @foreach ($bookmarks as $bookmark)
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="thumbnail transition">
            <div class="thumbnail-wrap">

                <div class="thumbnail-img transition">
                    <img class="img-responsive transition" src="{{ $bookmark->favourite->image }}">
                </div>

                <div class="thumbnail-a"><a href="/bookmark/{{ $bookmark->id }}">
                    <button class="btn btn-primary transition">Lock it</button>
                </a></div>

                <div class="caption">
                    <h4>{{ $bookmark->favourite->name }}</h4>
                    @if ($bookmark->favourite->type == 'movies')
                    <p>{{ $bookmark->favourite->data->director }}</p>
                    @endif
                </div>

                <div class="thumbnail-meta">
                    <ul class="row">
                        <li class="col-md-3 col-sm-3 col-xs-3 like"><a href="#"><span class="glyphicon glyphicon-heart"></span><span> 15</span></a></li>
                        <li class="col-md-3 col-sm-3 col-xs-3 comment"><a href="/bookmark/{{ $bookmark->id }}"><span class="glyphicon glyphicon-comment"></span><span> {{ $bookmark->comments->count() }}</span></a></li>
                        <li class="col-md-3 col-sm-3 col-xs-3 sharing"><a href="#" class="addPost" value="{{ $bookmark->id }}"><span class="glyphicon glyphicon-lock"></span><span> 15</span></a></li>
                        <li class="col-md-3 col-sm-3 col-xs-3 report text-right"><a href="">
                        <!-- if report -->
                        {{-- <span class="glyphicon glyphicon-flag"></span> --}}

                        <!-- if delete -->
                        <span class="glyphicon glyphicon-remove"></span>
                        </a></li>
                    </ul>
                </div>

            </div>
            </div>
        </div>
        @endforeach

    </div> <!-- /.list post-->
    </div> <!-- /.thumbnail box-->

</div> <!-- /.box page -->

@include('bookmark.save')
@stop