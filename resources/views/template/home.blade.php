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
                <img class="media-object comment-avatar" src="{{ $bookmark->user->profile->avatar or '/img/noava.png' }}" alt="...">
                </a>
            </div>
        </div>

        <div class="media-body">
            <p>{{ $bookmark->user->profile->display_name }} bookmark a {{ str_singular($bookmark->favourite->type) }}</p>
            <h4 class="media-heading"><small><abbr title="12:26am" data-livestamp="{{ $bookmark->created_at }}"></abbr></small></h4>

            <div class="panel panel-default">
            <div class="panel-body">
            <div class="media">

                <div class="media-left">
                    <div class="comment-poster">
                        <a href="/bookmark/{{ $bookmark->id }}">
                        <img class="media-object img-responsive" src="{{ $bookmark->favourite->image or '/img/unknown.png' }}" alt="...">
                        </a>
                    </div>
                </div>

                <div class="media-body">
                    <h5 class="media-heading"><a href="/bookmark/{{ $bookmark->id }}">{{$bookmark->favourite->name}}</a></h5>
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

