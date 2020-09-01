@extends('dashboard.layouts.default')

@section('title', "$category->name")

@section('dashboard-content')
    @parent
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Админка</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Категории</a></li>
                <li class="breadcrumb-item active" aria-current="page">Категория: #{{ $category->name }}</li>
            </ol>
        </nav>

        {!! Form::open(['method' => 'patch' ,'url' => route('dashboard.categories.update', $category->id)]) !!}
        @include('dashboard.categories.blocks.form.fields')

        <div class="form-group">
            {!! Form::submit('Редактировать', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
