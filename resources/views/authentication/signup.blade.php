<div class="signup-form">

    {!! Form::open(array('url'=>'/signup', 'autocomplete' => 'off')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h4>Join Plock to explore your intereested and hearing from your friends.</h4>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    @if(Session::has('flash_message'))
        <p class="alert">{{ Session::get('flash_message') }}</p>
    @endif

    <div class="form-group">
        {!! Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) !!}
        {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) !!}
        {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) !!}
        {!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) !!}
    </div>
    {!! Form::submit('Sign up', array('class'=>'btn btn-primary btn-block'))!!}
    {!! Form::close() !!}

</div>