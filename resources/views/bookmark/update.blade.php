<div class="edit-post">

    <div class="modal fade" id="inputEditBookmark" tabindex="-1" role="dialog" aria-labelledby="editPost" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $bookmark->favourite->name }}</h4>
            </div>

            {{-- FORM create--}}
            {!! Form::open(array('url'=>"/bookmark/update/$bookmark->id", 'class' => 'editPost-form', 'autocomplete' => 'off')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::textarea('description', $bookmark->description, array('class'=>'form-control', 'placeholder'=>'Your review')) !!}
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