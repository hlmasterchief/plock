@extends('template.template')

@section('main-content')

<div class="post">
    <div class="panel panel-default" id="information">
        <div class="panel-body">

        <div class="row">
            <div class="col-sm-4 col-md-3">
                <img src="{{ $bookmark->favourite->image }}" class="img-responsive center-block"/>
            </div>

            <div class="col-sm-8 col-md-9">
                <dl class="dl-inline">
                    <dt>Title</dt>
                    <dd>{{ $bookmark->favourite->name }}</dd>

                    @foreach ($datas as $key => $data)
                        <dt>{{ $key }}</dt>
                        <dd>{{ $data }}</dd>
                    @endforeach

                    <dt class="strong">Description</dt>
                    <dd>
                        @if ($bookmark->favourite->type == 'movies')
                        <p>{{ $bookmark->favourite->data->plot }}</p>
                        @endif

                    </dd>
                </dl>
            </div>
        </div>

        </div>
    </div>

    <div class="panel panel-default" id="review">
        <div class="panel-heading">
            <h3 class="panel-title">Review</h3>
        </div>

        <div class="panel-body">
            <p>{{ $bookmark->description }}</p>
        </div>
    </div>

    <div class="panel panel-default" id="review">
        <div class="panel-heading">
            <h3 class="panel-title">Comments</h3>
        </div>

        <div class="panel-body">

        @foreach ($comments as $comment)
        <div class="media">
            <div class="media-left">
                <div class="crop-48">
                    <a href="#">
                    <img class="media-object comment-avatar" src="{{ $comment->user->profile->avatar }}" alt="...">
                    </a>
                </div>
            </div>

            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->displayName() }} <small><abbr title="{{ $comment->created_at }}" data-livestamp="{{ $comment->created_at }}"></abbr></small></h4>
                <p>{{ $comment->content }}</p>
            </div>
        </div>
        @endforeach

        <div class="media">
            <div class="media-left">
                <div class="crop-48">
                    <a href="#">
                    <img class="media-object" src="{{ Auth::user()->profile->avatar }}" alt="...">
                    </a>
                </div>
            </div>

            <div class="media-body">
                <div class="height-48">
                {!! Form::open(array('url'=>'/comment/create', 'autocomplete' => 'off', 'id' => 'comment_form')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="bookmark_id" value="{{ $bookmark->id }}">
                <input type="submit">

                {!! Form::text('content', null, array('class'=>'form-control', 'placeholder'=>'Write a comment...')) !!}

                {!! Form::close() !!}
                </div>
            </div>
        </div>

        </div>
    </div>
</div>

@stop