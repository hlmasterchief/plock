@extends('layout.master')

@section('page')

<div class="welcome">

    <div class="wrapper">

        <div class="background">
        </div>

        <div class="overlay">
        </div>

        <div class="main">
            <div class="title">
                <h1>plock</h1>
                <h5>share your interest with friends</h5>
            </div>

            <div class="panel panel-default welcome-form">
                <div class="panel-body">
                    {{-- if login --}}
                    <h4>Please Login</h4>
                    @include('authentication.login')
                    {{-- end if login --}}

                    {{-- if sign up --}}
                    {{-- <h4>Join Plock</h4>
                    @include('authentication.signup') --}}
                    {{-- end if sign up --}}
                </div>
            </div>
        </div>

    </div>

</div>

@stop