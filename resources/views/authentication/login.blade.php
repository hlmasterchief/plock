<div class="login-form">

    {!! Form::open(array('url'=>'/login', 'autocomplete' => 'off')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{-- <h4>Please Login</h4> --}}

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    @if(Session::has('flash_message'))
        <p class="alert">{{ Session::get('flash_message') }}</p>
    @endif

    <div class="form-group float-label">
        {!! Form::text('username', null, array('class'=>'input-block', 'placeholder'=>'Username', 'required')) !!}
        <label for="username">Username</label>
    </div>
    <div class="form-group float-label">
        {!! Form::password('password', array('class'=>'input-block', 'placeholder'=>'Password', 'required')) !!}
        <label for="password">Password</label>
    </div>

    {!! Form::submit('Login', array('class'=>'btn btn-primary btn-block')) !!}
    <div class="option">
        <a href="#">Forgot your password ?</a><br/>
        <a href="#">Want to register new account ?</a>
    </div>
    {!! Form::close() !!}
</div>