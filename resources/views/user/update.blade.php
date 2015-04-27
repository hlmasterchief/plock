@extends('template.template')

@section('main-content')

<div class="update-profile">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Change your information</h3>
        </div>

        <div class="panel-body">
            {!! Form::open(array('url'=>'/profile/update', 'class' => 'updateProfile-form', 'autocomplete' => 'off')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                @if(Session::has('flash_message'))
                    <p class="alert">{{ Session::get('flash_message') }}</p>
                @endif
                <div class="form-group">
                    <label for="display_name">Display name</label>
                   {!! Form::text('display_name', $profile->display_name, array('class'=>'input-block', 'placeholder'=>'Display name')) !!}
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                   {!! Form::text('location', $profile->location, array('class'=>'input-block', 'placeholder'=>'Location')) !!}
                </div>
                <div class="form-group">
                    <label for="homepage">Your website</label>
                   {!! Form::text('homepage', $profile->homepage, array('class'=>'input-block', 'placeholder'=>'Your website')) !!}
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                   {!! Form::text('description', $profile->description, array('class'=>'input-block', 'placeholder'=>'Description')) !!}
                </div>
                <div class="form-group">
                    <h5>Change your profile picture</h5>
                    <p class="help-block">The image size shoul be 50x60px</p>
                    <div class="file-button btn btn-primary">
                        {{-- <button class="select-img" class="btn btn-primary">Select picture</button>--}}
                        <span>Select picture</span>
                        <input type="file" class="input-img">
                    </div>
                    <div class="message">
                        <div class="demo-img avartar crop-140">
                        <img class="media-object" src="https://s.vndb.org/cv/53/15453.jpg" />
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <h5>Change your cover picture</h5>
                    <p class="help-block">The image size should be 50x60px</p>
                    <div class="file-button btn btn-primary">
                        {{-- <button class="select-img" class="btn btn-primary">Select picture</button>--}}
                        <span>Select picture</span>
                        <input type="file" class="input-img">
                    </div>
                    <div class="message">
                        <div class="demo-img cover">
                        <img class="img-responsive" src="https://s.vndb.org/cv/53/15453.jpg" />
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

@stop