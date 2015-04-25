<div class="login-form">

    {!! Form::open(array('url'=>'/login', 'autocomplete' => 'off')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h4>Please Login</h4>

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
        {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) !!}
    </div>
    {!! Form::submit('Login', array('class'=>'btn btn-primary btn-block')) !!}
    <div><a href="#">Forgot your password ?</a></div>
    {!! Form::close() !!}
</div>