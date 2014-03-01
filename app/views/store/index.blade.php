@extends('layouts.main')

@section('promo')

<section id="promo">
    <div id="promo-details">
        <h1>Today's Deals</h1>

        <p>Checkout this section of<br/>
            products at a discounted price.</p>
        <a href="#" class="default-btn">Shop Now</a>
    </div>
    <!-- end promo-details -->
    {{ HTML::image('img/promo.png', 'Promotional Ad')}}
</section><!-- promo -->

@stop

@section('content')
<!-- Category Section -->
<h2>Choose Your Category</h2>
<hr>
<div class="demo-2">
    <section id="grid" class="grid clearfix">
        @foreach($catnav as $cat)
        <a href="{{ url('/store/category/'.$cat->id) }}"
           data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
            <figure>
                {{ HTML::image($cat->image, $cat->name) }}
                <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                    <path
                        d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/>
                </svg>
                <figcaption>
                    <h2>{{ $cat->name }}</h2>
                    <p>{{ $cat->description }}</p>
                    <button>View</button>
                </figcaption>
            </figure>
        </a>
        @endforeach
    </section>
</div>

<!-- New products Section -->
<h2>New Products</h2>
<hr>
<section class="list_carousel">
    <div id="products">
        @foreach($products as $product)
        <div class="product product_front">
            <a href="/store/view/{{ $product->id }}">
                {{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240',
                'height'=>'127')) }}
            </a>
            <section class="product_info">
                <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

                <p class="front_offers">{{ str_limit($product->description, $limit = 100, $end = '...')}}</p>
            </section>
            <section class="product_add_to_cart">
                <h5>
                    Availability:
            	<span class="{{ Availability::displayClass($product->availability) }}">
            		{{ Availability::display($product->availability) }}
            	</span>
                </h5>
                {{ Form::open(array('url'=>'store/addtocart')) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('id', $product->id) }}
                <button type="submit" class="cart-btn">
                    <span class="price">{{ $product->price }}</span>
                    {{ HTML::image('img/white-cart.gif', 'Add to Cart') }}
                    ADD TO CART
                </button>
                {{ Form::close() }}
            </section>
        </div>
        @endforeach
    </div>
    <!-- end products -->
</section><!-- end list carousel -->

<img src="{{asset('img/prev.png')}}" alt="Previous" class="prev"/>
<img src="{{asset('img/next.png')}}" alt="Next" class="next"/>

@stop