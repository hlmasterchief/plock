@extends('template.template')

@section('main-content')

<div class="box-addPost" style="padding-top: 70px;">
    <button class="btn btn-primary" id="addPost">Add to Box</button>

    <div class="modal fade" id="inputAddPost" tabindex="-1" role="dialog" aria-labelledby="editBox" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapymaher</h4>
            </div>

            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <div class="media">

                        <div class="media-left">
                            <div class="comment-poster">
                                <a href="#">
                                <img class="media-object img-responsive" src="https://s.vndb.org/cv/53/15453.jpg" alt="...">
                                </a>
                            </div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Hapymaher</h5>
                            <small>Admiration we surrounded possession frequently he.</small>
                        </div>

                    </div>
                    </div>
                </div>

                <form class="box-addPost-form" autocomplete="off">
                    <div class="form-group float-label">
                        <input type="text" id="boxName" name="boxName" class="input-block" placeholder="Create new box">
                    </div>

                    <div class="dropdown">
                        <div data-toggle="dropdown" class="dropdown-toggle" id="createButton">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Move to box <span class="caret"></span>
                            </button>
                        </div>
                        <ul class="dropdown-menu">
                            <li>Box A</li>
                            <li>Box B</li>
                        </ul>
                    </div>
                </form>{{-- end new interest name --}}

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Done</button>
            </div>

        </div>
        </div>
    </div>
</div>

@stop