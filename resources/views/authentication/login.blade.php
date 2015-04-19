<div class="login-form">
    {!! Form::open(array('url'=>'/login', 'autocomplete' => 'off')) !!}
    <h4>Please Login</h4>
    {{-- <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif --}}
    <div class="form-group">
        {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) !!}
        {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) !!}
    </div>
    {!! Form::submit('Login', array('class'=>'btn btn-primary btn-block')) !!}
    <div><a href="#">Forgot your password ?</a></div>
    {!! Form::close() !!}
</div>