<div class="edit-box">

    <div class="modal fade" id="inputEditBox" tabindex="-1" role="dialog" aria-labelledby="editBox" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $box->title }}</h4>
            </div>

            {{-- FORM create--}}
            {!! Form::open(array('url'=>"/box/update/$box->id", 'class' => 'editBox-form', 'autocomplete' => 'off')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <div class="modal-body">
                    <div class="form-group float-label">
                        {!! Form::text('title', $box->title, array('class'=>'input-block', 'placeholder'=>'Box name', 'required')) !!}
                        <label for="title" class="input-icon">Box name</label>
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('description', $box->description, array('class'=>'form-control', 'placeholder'=>'What is your box about?')) !!}
                    </div>
                </div>

                <div class="modal-footer">
                    {!! Form::button('Cancle', array('class'=>'btn btn-default', 'data-dismiss'=>'modal'))!!}
                    {!! Form::submit('Done', array('class'=>'btn btn-primary'))!!}
                </div>
            {!! Form::close() !!}
            {{-- end new interest name --}}

        </div>
        </div>
    </div>
</div>