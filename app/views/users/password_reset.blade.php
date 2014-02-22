@extends('layouts.main')

@section('content')
<section id="signin-form">
    <h1>Reset Your Password Now</h1>
    {{ Form::open() }}
    {{ Form::hidden('token', $token) }}
    <p>{{ Form::label('email', 'Email Address') }}</p>

    <p>{{ Form::text('email', null, ['required' => true]) }}</p>

    <p>{{ Form::label('password', 'Password') }}</p>

    <p>{{ Form::password('password', null, ['required' => true]) }}</p>

    <p>{{ Form::label('password_confirmation', 'Password Confirmation') }}</p>

    <p>{{ Form::password('password_confirmation', null, ['required' => true]) }}</p>
    {{ Form::button('Create New Password', array('type' => 'Submit', 'class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}
    @if (Session::has('error'))
    <p>{{ Session::get('reason') }}</p>
    @endif
</section>
@stop