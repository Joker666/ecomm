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
            {{ Form::label('description') }}
            <textarea rows="4" cols="48" name="description">
                {{ $category->description or 'Default'}}
            </textarea>
        </p>
        <p>
            <img src="{{ url($category->image) }}" />
        </p>
        <p>
            <a href="{{ url('admin/categories/getChangePhoto/'.$category->id) }}">Change this photo</a>
        </p>
        {{ Form::submit('Update Category', array('class' => 'secondary-cart-btn' )) }}
        {{ Form::close() }}
    </section>
</div><!-- end admin -->

@stop