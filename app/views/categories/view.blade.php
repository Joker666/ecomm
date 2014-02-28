@extends('layouts.main')

@section('content')

<div id="admin">
    <p>Here you can view, delete and create new categories.</p>
    <h2>Categories</h2>
    <hr>
    <section>
        {{ Form::open(array('url' => 'admin/categories/create/'.$category->id, 'files' => true)) }}
        <p>
            {{ Form::label('name') }}
            <input type="text" name="name"value="{{ $category->name or 'Default'}}" />
        </p>

        <p>
            {{ Form::label('image', 'Choose an Image') }}
            {{ Form::file('image') }}
        </p>
        {{ Form::submit('Update Category', array('class' => 'secondary-cart-btn' )) }}
        {{ Form::close() }}
    </section>
</div><!-- end admin -->

@stop