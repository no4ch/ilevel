@extends('dashboard.layouts.default')

@section('title', 'Категории')

@section('dashboard-content')
    @parent
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Админка</a></li>
            <li class="breadcrumb-item active" aria-current="page">Категории</li>
        </ol>
    </nav>
    <div
        class="pt-3 pb-2 mb-3 border-bottom ">
        <h1>Категории</h1>
    </div>
    @if(isset($categories))
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col" style="max-width: 35%">Описание</th>
                <th scope="col" colspan="3">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td style="max-width: 35%">{{ $category->description ?: 'Описание отсутствует' }}</td>
                    <td><a href="{{ route('dashboard.categories.products.index', $category->id) }}" class="">Просмотреть товары</a></td>
                    <td><a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-primary">Редактировать</a></td>
                    <td>
                        <form id="destroy-form"
                              action="{{ route('dashboard.categories.destroy', $category->id) }}"
                              method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger pl-2 pr-2 pt-1 pb-1" type="submit">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <p>Пусто</p>
            @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
    @endif
@endsection
