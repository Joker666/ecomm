@extends('layouts.main')

@section('content')

<section id="signin-form">
    <h1>I have an account</h1>
    {{ Form::open(array('url' => 'users/signin')) }}
        <p>
            {{ HTML::image('img/email.gif', 'Email Address') }}
            {{ Form::text('email') }}
        </p>
         <p>
            {{ HTML::image('img/password.gif', 'Password') }}
            {{ Form::password('password') }}
        </p>

        {{ Form::button('Sign In', array('type' => 'Submit', 'class' => 'secondary-cart-btn')) }}
        {{ link_to_route('password_resets.create', 'Forgot Your Password?' , null, array('class' => 'forgot_password'))}}
        {{ Form::close() }}

</section><!-- end signin-form -->
<section id="signup">
    <h2>I'm a new customer</h2>
    <h3>You can create an account in just a few simple steps.<br>
        Click below to begin.</h3>

    {{ HTML::link('users/newaccount', 'Create New Account', array('class' => 'default-btn')) }}
</section><!--- end signup -->

@stop