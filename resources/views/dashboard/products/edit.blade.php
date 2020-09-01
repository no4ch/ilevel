@extends('dashboard.layouts.default')

@section('title', "$product->name")

@section('dashboard-content')
    @parent
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Админка</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.products.index', $category->id) }}">{{ $category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">#{{ $product->name }}</li>
            </ol>
        </nav>

        {!! Form::open(['method' => 'patch' ,'url' => route('dashboard.categories.products.update', [$category->id, $product->id])]) !!}
        @include('dashboard.products.blocks.form.fields')

        <div class="form-group">
            {!! Form::submit('Редактировать', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
