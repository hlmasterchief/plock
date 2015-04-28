<div class="signup-form">

    {!! Form::open(array('url'=>'/signup', 'autocomplete' => 'off')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    @if(Session::has('flash_message'))
        <p class="alert">{{ Session::get('flash_message') }}</p>
    @endif

    <div class="float-label">
        {!! Form::text('username', null, array('class'=>'input-block', 'placeholder'=>'Username', 'required')) !!}
        <label for="username">Username</label>
    </div>
    <div class="float-label">
        {!! Form::text('email', null, array('class'=>'input-block', 'placeholder'=>'Email', 'required')) !!}
        <label for="email">Email</label>
    </div>
    <div class="float-label">
        {!! Form::password('password', array('class'=>'input-block', 'placeholder'=>'Password', 'required')) !!}
        <label for="password">Password</label>
    </div>
    <div class="float-label">
        {!! Form::password('password_confirmation', array('class'=>'input-block', 'placeholder'=>'Confirm Password', 'required')) !!}
        <label for="password_confirmation">Confirm Password</label>
    </div>

    {!! Form::submit('Sign up', array('class'=>'btn btn-primary btn-block'))!!}
    <div class="option">
        <a href="/">Want to login ?</a>
    </div>
    {!! Form::close() !!}

</div>