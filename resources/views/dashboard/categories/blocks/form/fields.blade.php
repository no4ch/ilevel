<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Имя') !!}
            {!! Form::text('name', $category->name ?? null, ['class' => 'form-control']) !!}
        </div>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('description', 'Описание') !!}
            {!! Form::textarea('description', $category->description ?? null, ['class' => 'form-control', 'rows' => 2]) !!}
        </div>

        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
