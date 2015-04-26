@extends('template.template')

@section('main-content')

<div class="edit-box" style="padding-top: 70px;">
    <button class="btn btn-primary" id="editBox">Edit post</button>

    <div class="modal fade" id="inputEditBox" tabindex="-1" role="dialog" aria-labelledby="editBox" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The hunger game</h4>
            </div>

            {{-- FORM create--}}
            <form class="editBox-form" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group float-label">
                        <input type="text" id="boxName" name="boxName" class="input-block" value="The hunger game" required>
                        <label for="boxName" class="input-icon">Box name</label>
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="boxDescription">After an accident, Tooru experienced lucid dreams every time he slept. Realizing that he’s in a dream all the time means that his body cannot rest, leading to him getting rest only when he collapsed from exhaustion. One day, a girl who he hadn’t seen since the accident appeared in his dream.</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Done</button>
                </div>
            </form>{{-- end new interest name --}}

        </div>
        </div>
    </div>
</div>

@stop