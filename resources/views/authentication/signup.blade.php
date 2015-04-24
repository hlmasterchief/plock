<div class="signup-form">
    {!! Form::open(array('url'=>'/register', 'autocomplete' => 'off')) !!}
    <h4>Join Plock to explore your intereested and hearing from your friends.</h4>
    <div class="form-group">
        {!! Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) !!}
        {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) !!}
        {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) !!}
    </div>
    {!! Form::submit('Sign up', array('class'=>'btn btn-primary btn-block'))!!}
    {!! Form::close() !!}

</div>