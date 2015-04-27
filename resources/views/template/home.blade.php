@extends('template.template')

@section('main-content')

<div class="homepage">

@foreach ($bookmarks as $bookmark)
<div class="panel panel-default">
    <div class="panel-body">
    <div class="media">

        <div class="media-left">
            <div class="crop-48">
                <a href="/{{ $bookmark->user->username }}">
                <img class="media-object comment-avatar" src="{{ $bookmark->user->avatar or '/img/noava.png' }}" alt="...">
                </a>
            </div>
        </div>

        <div class="media-body">
            <h4 class="media-heading"><small><abbr title="12:26am" data-livestamp="1429651588"></abbr></small></h4>
            <p>{{ $bookmark->user->profile->display_name }} bookmark a {{ str_singular($bookmark->favourite->type) }}</p>

            <div class="panel panel-default">
            <div class="panel-body">
            <div class="media">

                <div class="media-left">
                    <div class="comment-poster">
                        <a href="/favourite/{{ $bookmark->favourite->id }}">
                        <img class="media-object img-responsive" src="{{ $bookmark->favourite->image or '/img/unknown.png' }}" alt="...">
                        </a>
                    </div>
                </div>

                <div class="media-body">
                    <h5 class="media-heading">{{$bookmark->favourite->name}}</h5>
                    <small>{{$bookmark->favourite->data->getShortDataAttribute()['description']}}</small>
                </div>

            </div>
            </div>
            </div>
        </div>

    </div>
    </div>
</div><!-- /.news -->
@endforeach

</div> <!-- /.homepage -->
@stop

