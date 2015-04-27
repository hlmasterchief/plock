<div class="create-box">
    <div class="modal fade" id="inputBox" tabindex="-1" role="dialog" aria-labelledby="createBox" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create a box</h4>
            </div>

            {!! Form::open(array('url'=>'/box/create', 'class' => 'createBox-form', 'autocomplete' => 'off')) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

                <div class="modal-body">
                    <div class="form-group float-label">
                        {!! Form::text('title', null, array('class'=>'input-block', 'placeholder'=>'Box name', 'required')) !!}
                        <label for="title">Box name</label>
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'What is your box about?')) !!}
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