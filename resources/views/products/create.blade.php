@extends('layouts.app')

@section('title', 'Добавить продукт')

@section('content')
<div class="form-container mx-auto col-md-6">
    <h3 class="mb-4">Добавить продукт</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="article">Артикул</label>
            <input type="text" name="article" id="article" class="form-control" value="{{ old('article') }}" required>
        </div>
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-control" required>
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Доступен</option>
                <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Не доступен</option>
            </select>
        </div>
        <div class="form-group">
            <label for="color">Цвет</label>
            <input type="text" name="data[color]" id="color" class="form-control" value="{{ old('data.color') }}">
        </div>
        <div class="form-group">
            <label for="size">Размер</label>
            <input type="text" name="data[size]" id="size" class="form-control" value="{{ old('data.size') }}">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Добавить</button>
    </form>
</div>
@endsection
