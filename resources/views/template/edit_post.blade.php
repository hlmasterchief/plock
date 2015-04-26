@extends('template.template')

@section('main-content')

<div class="edit-box" style="padding-top: 70px;">
    <button class="btn btn-primary" id="editBox">Edit post</button>

    <div class="modal fade" id="inputEditBox" tabindex="-1" role="dialog" aria-labelledby="editBox" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapymaher</h4>
            </div>

            {{-- FORM create--}}
            <form class="createPost-form">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="input-block" id="genre" value="Drama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-block" id="country" value="Japanese">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-block" id="director" value="Japanese">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-block" id="published" value="1990">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="review">After an accident, Tooru experienced lucid dreams every time he slept. Realizing that he’s in a dream all the time means that his body cannot rest, leading to him getting rest only when he collapsed from exhaustion. </textarea>
                    </div>

                    <div class="form-group">
                        <h5>Set a picture for your bookmark</h5>
                        <p class="help-block">The image size shoul be 50x60px</p>
                        <div class="file-button btn btn-primary">
                            {{-- <button class="select-img" class="btn btn-primary">Select picture</button>--}}
                            <span>Select picture</span>
                            <input type="file" class="input-img">
                        </div>
                        <div class="message">
                            <div id="demo-img">
                            <img class="img-thumbnail" src="https://s.vndb.org/cv/53/15453.jpg" />
                        </div>
                    </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>{{-- end new interest name --}}

        </div>
        </div>
    </div>
</div>

@stop