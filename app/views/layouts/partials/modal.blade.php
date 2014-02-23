<div class="modal fade" id="signIN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">I have an account</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(array('url' => 'users/signin')) }}
                <input type="text" name="email" id="email" placeholder="Email"/>
                <input type="password" name="password" id="password" placeholder="Password"/>
            </div>
            {{ link_to_route('password_resets.create', 'Forgot Your Password?', null, array('class' => 'forgot_password'))}}
            <div class="modal-footer">
                {{ HTML::link('users/newaccount', 'Sign Up', ['class' => 'tertiary-btn', 'style' => 'float:left']) }}
                <!--<button class="tertiary-btn" onclick="location.href="{{ url('/users/newaccount') }}"" style="float:left">Create New Account</button>-->
                {{ Form::button('Sign In', array('type' => 'Submit', "class"=>"tertiary-btn")) }}
                {{ Form::close() }}
                <button class="tertiary-btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>