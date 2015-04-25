<div class="update-form">

    {!! Form::open(array('url'=>'/update', 'autocomplete' => 'off')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h4>Update your login</h4>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    @if(Session::has('flash_message'))
        <p class="alert">{{ Session::get('flash_message') }}</p>
    @endif

    <div class="form-group">
        {!! Form::password('old_password', array('class'=>'form-control', 'placeholder'=>'Current Password')) !!}
        {!! Form::text('email', $email, array('class'=>'form-control', 'placeholder'=>'Email')) !!}
        {!! Form::text('email_confirmation', $email, array('class'=>'form-control', 'placeholder'=>'Confirm Email')) !!}
        {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) !!}
        {!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) !!}
    </div>
    {!! Form::submit('Submit', array('class'=>'btn btn-primary btn-block'))!!}
    <div><a href="/logout">Logout</a></div>
    {!! Form::close() !!}

</div>