<div class="create-favourite">
    <div class="modal fade" id="inputFavourite" tabindex="-1" role="dialog" aria-labelledby="createFavourite" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create a favourite</h4>
            </div>

            {!! Form::open(array('url'=>'/favourite/create', 'class' => 'createFavourite-form', 'autocomplete' => 'off')) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="type" id="favourite_create_type">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="input-block" id="name" placeholder="Name">
                    </div>

                    <div class="dropdown">
                       <div data-toggle="dropdown" class="dropdown-toggle">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="favoutire_choose_selected">
                            Choose type <span class="caret"></span>
                            </button>
                        </div>

                        <ul class="dropdown-menu">
                            <li class ="favoutire_choose_create" value="musics">Music</li>
                            <li class ="favoutire_choose_create" value="movies">Movie</li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <input type="text" class="input-block" id="genre" placeholder="Genre">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-block" id="country" placeholder="Country">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-block" id="director" placeholder="Drector">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-block" id="year" placeholder="Published year">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="description" placeholder="What is your bookmark about?"></textarea>
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
                            <div class="demo-img">
                            <img class="img-thumbnail" src="https://s.vndb.org/cv/53/15453.jpg" />
                            </div>
                        </div>
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