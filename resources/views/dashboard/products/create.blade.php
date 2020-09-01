@extends('dashboard.layouts.default')

@section('title', "Добавление товара")

@section('dashboard-content')
    @parent
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Админка</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.products.index', $category->id) }}">{{ $category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Добавить товар</li>
            </ol>
        </nav>

        {!! Form::open(['url' => route('dashboard.categories.products.store', $category->id)]) !!}
        @include('dashboard.products.blocks.form.fields')

        <div class="form-group">
            {!! Form::submit('Добавить', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
