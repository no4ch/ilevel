@extends('dashboard.layouts.default')

@section('title', "$category->name")

@section('dashboard-content')
    @parent
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Админка</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Категории</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
        </ol>
    </nav>
    <div
        class="pt-3 pb-2 mb-3 border-bottom ">
        <h1>{{ $category->name }}</h1>
        <a href="{{ route('dashboard.categories.products.create', $category->id) }}" class="btn btn-primary">Добавить
                                                                                                             продукт</a>
    </div>

    @if(isset($category->products))
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col" style="max-width: 35%">Описание</th>
                <th scope="col" style="max-width: 25%">Категории</th>
                <th scope="col">Цена</th>
                <th scope="col" colspan="2">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($category->products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td style="max-width: 35%">{{ $product->description ?: 'Описание отсутствует' }}</td>
                    <td style="max-width: 25%">
                        @forelse($product->categories as $product_category)
                            <div class="row mb-1">
                                <a href="{{ route('dashboard.categories.products.index', $product_category->id) }}" class="mr-2">
                                    {{ $product_category->name }}
                                </a>
                                <form id="destroy-form"
                                      action="{{ route('dashboard.destroyCategory', $product_category->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        Удалить
                                    </button>
                                </form>
                            </div>

                        @empty
                            'Категория не указана'
                        @endforelse
                    </td>
                    <td>{{ $product->price }}</td>
                    <td><a href="{{ route('dashboard.categories.products.edit', [$category->id, $product->id]) }}"
                           class="btn btn-primary">Редактировать</a></td>
                    <td>
                        <form id="destroy-form"
                              action="{{ route('dashboard.categories.products.destroy', [$category->id, $product->id]) }}"
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

    @endif
@endsection
