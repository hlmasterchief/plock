@extends('template.template')

@section('main-content')

<div class="update-account">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Change account</h3>
        </div>

        <div class="panel-body">
            {!! Form::open(array('url'=>'/update', 'class' => 'updateAccount-form', 'autocomplete' => 'off')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                @if(Session::has('flash_message'))
                    <p class="alert">{{ Session::get('flash_message') }}</p>
                @endif

                <h4>Do you want to change email address ?</h4><br>
                <div class="form-group">
                    <label for="email">New Email</label>
                    {!! Form::text('email', $email, array('class'=>'input-block', 'placeholder'=>'example: abc@mail.com')) !!}
                </div>
                <div class="form-group">
                    <label for="email_confirmation">Repeat Email</label>
                    {!! Form::text('email_confirmation', $email, array('class'=>'input-block', 'placeholder'=>'example: abc@mail.coml')) !!}
                </div>
                <br>
                <br>
                <h4>Do you want to change password ?</h4><br>
                <div class="form-group">
                    <label for="old_password">Current Password</label>
                    {!! Form::password('old_password', array('class'=>'input-block', 'placeholder'=>'Enter your current password here')) !!}
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    {!! Form::password('password', array('class'=>'input-block', 'placeholder'=>'Password should be at least 6 characters and contain symbols @#$&%')) !!}
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Repeat Password</label>
                    {!! Form::password('password_confirmation', array('class'=>'input-block', 'placeholder'=>'Reapeat new password here')) !!}
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