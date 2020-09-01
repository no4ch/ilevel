<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Имя') !!}
            {!! Form::text('name', $product->name ?? null, ['class' => 'form-control']) !!}
        </div>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('description', 'Описание') !!}
            {!! Form::textarea('description', $product->description ?? null, ['class' => 'form-control', 'rows' => 2]) !!}
        </div>

        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('price', 'Цена') !!}
            {!! Form::number('price', $product->price ?? null, ['class' => 'form-control', 'rows' => 2]) !!}
        </div>

        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if(!isset($createMode))
            <div class="form-group">
                <label for="category_id">Добавить категорию</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="-1">Не добавлять</option>
                    @forelse($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        @endif
    </div>
</div>
