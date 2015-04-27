<div class="box-addPost">

    <div class="modal fade" id="inputAddPost" tabindex="-1" role="dialog" aria-labelledby="savePost" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Save bookmark</h4>
            </div>

            {!! Form::open(array('url'=>"/bookmark/save", 'class' => 'box-addPost-form', 'autocomplete' => 'off')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="bookmark_id" id="bookmark_id">
                <input type="hidden" name="box_new_id" id="box_new_id">
                <div class="modal-body">

                    <div class="form-group float-label">
                        {!! Form::text('newbox', null, array('class'=>'input-block', 'placeholder'=>'Create new box')) !!}
                    </div>

                    <div class="dropdown">
                        <div data-toggle="dropdown" class="dropdown-toggle" id="createButton">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="box_choose_selected">
                            Move to box <span class="caret"></span>
                            </button>
                        </div>
                        <ul class="dropdown-menu">
                            <li class="box_choose_save" value="0">No box</li>
                            @foreach (Auth::user()->boxes as $box)
                            <li class="box_choose_save" value="{{ $box->id }}">{{ $box->title }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="form-group">
                        {!! Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Your review')) !!}
                    </div>

                </div>

                <div class="modal-footer">
                    {!! Form::button('Cancle', array('class'=>'btn btn-default', 'data-dismiss'=>'modal'))!!}
                    {!! Form::submit('Done', array('class'=>'btn btn-primary'))!!}
                </div>
                {!! Form::close() !!}

        </div>
        </div>
    </div>
</div>