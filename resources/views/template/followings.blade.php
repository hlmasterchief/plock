@extends('template.profile')

@section('menu-content')

<div class="followings">
    <div class="panel panel-default">
        <div class="panel-body">

        <div class="row">

            <div class="col-md-6 col-sm-6">
                <div class="panel panel-default">

                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                            <div class="crop-64"><img class="media-object" src="http://yami.moe/img/kudchan.jpg"></div>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">An Pham</h4><!-- username -->
                            <p>Oulu, Finland</p><!-- location -->
                        </div>
                    </div>
                    <div class="follow-button">
                        {{-- follow/unfollow --}}
                        <button class="btn btn-primary">Follow</button>
                    </div>
                </div>

                </div>
            </div>

        </div>

        </div>
    </div>
</div>

@stop