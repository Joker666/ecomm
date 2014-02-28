@extends('layouts.main')

@section('content')

<div id="admin">
    <h1>Categories Admin Panel</h1>
    <hr>
    <p>Here you can view, delete and create new categories.</p>

    <h2>Categories</h2>
    <hr>
    <ul>
        @foreach ($categories as $category)
        <li>
            {{ HTML::image($category->image, $category->title, array('width'=>'50')) }}
            {{ $category->name }} -
            {{ Form::open(array('url' => 'admin/categories/destroy', 'class' => 'form-inline')) }}
            {{ Form::hidden('id', $category->id) }}
            {{ Form::submit('Delete') }}
            {{ Form::close() }} |
            <a href="{{ url('admin/categories/update/'.$category->id) }}">Update</a>
        </li>
        @endforeach
    </ul>
    <h2>Create New Category</h2>
    <hr>

    @if ($errors->has())
    <div id='form-errors'>
        <p>The following errors have occured:</p>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <!-- end form-errors-->
    @endif

    {{ Form::open(array('url' => 'admin/categories/create', 'files' => true)) }}
    <p>
        {{ Form::label('name') }}
        {{ Form::text('name') }}
    </p>

    <p>
        {{ Form::label('image', 'Choose an Image') }}
        {{ Form::file('image') }}
    </p>
    {{ Form::submit('Create Category', array('class' => 'secondary-cart-btn' )) }}
    {{ Form::close() }}
</div><!-- end admin -->

@stop