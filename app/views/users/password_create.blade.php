@extends('layouts.main')

@section('content')
<section id="signin-form">
    <h1>Reset Your Password</h1>
    {{ Form::open(['route' => 'password_resets.store']) }}
    <p>{{ Form::label('email', 'Email Address') }}</p>

    <p>{{ Form::text('email', null, ['required' => true]) }}</p>
    {{ Form::button('Reset', array('type' => 'Submit', 'class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}
    @if (Session::has('error'))
    <p>{{ Session::get('reason') }}</p>
    @endif
</section>
@stop