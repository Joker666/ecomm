<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>eCommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/normalize.css') }}
    {{ HTML::style('css/main.css') }}
    {{ HTML::style('css/component.css') }}
    {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::script('js/jquery.carouFredSel-6.2.1-packed.js') }}
    {{ HTML::script('js/jquery.mousewheel.min.js') }}
    {{ HTML::script('js/jquery.touchSwipe.min.js') }}
    {{ HTML::script('js/jquery.transit.min.js') }}
    {{ HTML::script('js/jquery.ba-throttle-debounce.min.js') }}
    {{ HTML::script('js/jquery.cycle.all.js') }}
    {{ HTML::script('js/Scroll_Up/js/jquery.scrollUp.min.js') }}
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->

<div id="wrapper">
    <header>
        <!--<section id="top-area">
            <p>Phone orders: 1-800-0780 | Email us: <a href="mailto:office@shop.com">office@shop.com</a></p>
        </section>-->
        <!-- end top-area -->
        <section id="action-bar">
            <div id="logo">
                <a href="/"><span id="logo-accent">e</span>Commerce</a>
            </div>
            <!-- end logo -->

            <nav class="dropdown">
                <ul>
                    <li>
                        <a href="#">Shop by Category {{ HTML::image('img/down-arrow.gif', 'Shop by Category') }}</a>
                        <ul>
                            @foreach($catnav as $cat)
                            <li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>

            <div id="search-form">
                {{ Form::open(array('url'=>'store/search', 'method'=>'get')) }}
                {{ Form::text('keyword', null, array('placeholder'=>'Search by keyword', 'class'=>'search')) }}
                {{ Form::submit('Search', array('class'=>'search submit')) }}
                {{ Form::close() }}
            </div>
            <!-- end search-form -->

            <div id="user-menu">

                @if(Auth::check())
                <nav class="dropdown">
                    <ul>
                        <li>
                            <a href="#">{{ HTML::image('img/user-icon.gif', Auth::user()->firstname) }} {{
                                Auth::user()->firstname }} {{ HTML::image('img/down-arrow.gif', Auth::user()->firstname)
                                }}</a>
                            <ul>
                                @if(Auth::user()->admin == 1)
                                <li>{{ HTML::link('admin/categories', 'Manage Categories') }}</li>
                                <li>{{ HTML::link('admin/products', 'Manage Products') }}</li>
                                @endif
                                <li>{{ HTML::link('users/signout', 'Sign Out') }}</li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                @else
                <nav id="signin" class="dropdown">
                    <ul>
                        <li>
                            <a href="#">{{ HTML::image('img/user-icon.gif', 'Sign In') }} Sign In {{
                                HTML::image('img/down-arrow.gif', 'Sign In') }}</a>
                            <ul>
                                <li>{{ HTML::link('#signIN', 'Sign In', array('data-toggle' => 'modal')) }}</li>
                                <li>{{ HTML::link('users/newaccount', 'Sign Up') }}</li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                @endif

            </div>
            <!-- end user-menu -->

            <div id="view-cart">
                <a href="{{ url('/store/cart') }}">{{ HTML::image('img/blue-cart.gif', 'View Cart') }} View Cart</a>
            </div>
            <!-- end view-cart -->
        </section>
        <!-- end action-bar -->


        <!-- Sticky Navbar -->
        <div id="sticky_navigation_wrapper">
            <div id="sticky_navigation">
                <div class="demo_container">
                    <ul>
                        <li><a href="#" class="selected">HOME</a></li>
                        <li><a href="#">ABOUT US</a></li>
                        <li><a href="#">SERVICES</a></li>
                        <li><a href="#">CLIENTS</a></li>
                        <li><a href="#">PARTNERS</a></li>
                        <li><a href="#">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Sticky Navbar End -->
    </header>


    <!-- Modal -->
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
                <div class="modal-footer">
                    <button class="tertiary-btn" onclick="location.href="
                    {{ url('/users/signup') }}"" style="float:left">Create New Account</button>
                    {{ Form::button('Sign In', array('type' => 'Submit', "class"=>"tertiary-btn")) }}
                    {{ Form::close() }}
                    <button class="tertiary-btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal END -->
    @yield('promo')

    @yield('search-keyword')

    <hr/>

    <section id="main-content" class="clearfix">
        @if (Session::has('message'))
        <div id="cool_confirm" style="display:none">
            <div class="center">
                <div id="cool_content"><h3>{{ Session::get('message') }}</h3></div>
                <div class="cool_close"><a href="{{ url('/') }}"><span>Close</span></a></div>
            </div>
        </div>
        @endif

        @yield('content')
    </section>
    <!-- end main-content -->

    <hr/>

    @yield('pagination')

    <footer>
        <section id="contact">
            <h3>For phone orders please call 1-800-000. You<br>can also email us at <a href="mailto:office@shop.com">office@shop.com</a>
            </h3>
        </section>
        <!-- end contact -->

        <hr/>

        <section id="links">
            <div id="my-account">
                <h4>MY ACCOUNT</h4>
                <ul>
                    <li>{{ HTML::link('users/signin', 'Sign In') }}</li>
                    <li>{{ HTML::link('users/newaccount', 'Sign Up') }}</li>
                    <li><a href="{{ url('/store/cart') }}">Shopping Cart</a></li>
                </ul>
            </div>
            <!-- end my-account -->
            <div id="info">
                <h4>INFORMATION</h4>
                <ul>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <!-- end info -->
            <div id="extras">
                <h4>EXTRAS</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li>{{ HTML::link('store/contact', 'Contact Us') }}</li>
                </ul>
            </div>
            <!-- end extras -->
        </section>
        <!-- end links -->

        <hr/>

        <section class="clearfix">
            <div id="copyright">
                <div id="logo">
                    <a href="#"><span id="logo-accent">e</span>Commerce</a>
                </div>
                <!-- end logo -->
                <p id="store-desc">This is a short description of the store.</p>

                <p id="store-copy">&copy; 2013 eCommerce. Theme designed by Adi Purdila.</p>
            </div>
            <!-- end copyright -->
            <div id="connect">
                <h4>CONNECT WITH US</h4>
                <ul>
                    <li class="twitter"><a href="#">Twitter</a></li>
                    <li class="fb"><a href="#">Facebook</a></li>
                </ul>
            </div>
            <!-- end connect -->
            <div id="payments">
                <h4>SUPPORTED PAYMENT METHODS</h4>
                {{ HTML::image('img/payment-methods.gif', 'Supported Payment Methods') }}
            </div>
            <!-- end payments -->
        </section>
    </footer>
</div>
<!-- end wrapper -->

{{ HTML::script('js/plugins.js') }}
{{ HTML::script('js/main.js') }}

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    var _gaq = [
        ['_setAccount', 'UA-XXXXX-X'],
        ['_trackPageview']
    ];
    (function (d, t) {
        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
        g.src = '//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g, s)
    }(document, 'script'));
</script>
</body>
</html>
