@extends('layout.master')

@section('page')

{{-- navagation --}}
@include('layout.header')

<div class="home container">
    @yield('main-content', '')
</div>

{{-- fixed create-button --}}
@include('layout.create-button')

@stop