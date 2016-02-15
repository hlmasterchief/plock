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
                    <h4>Please Login</h4>
                    @include('authentication.login')
                </div>
            </div>
        </div>

    </div>

</div>

@stop