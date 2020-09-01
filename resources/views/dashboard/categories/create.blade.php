@extends('dashboard.layouts.default')

@section('title', "Добавление категории")

@section('dashboard-content')
    @parent
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Админка</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Категории</a></li>
                <li class="breadcrumb-item active" aria-current="page">Добавление категории</li>
            </ol>
        </nav>

        {!! Form::open(['url' => route('dashboard.categories.store')]) !!}
        @include('dashboard.categories.blocks.form.fields')

        <div class="form-group">
            {!! Form::submit('Добавить', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
