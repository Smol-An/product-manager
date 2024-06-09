@extends('layouts.app')

@section('title', 'Редактировать продукт')

@section('content')
<div class="form-container mx-auto col-md-6">
    <h3 class="mb-4">Редактировать продукт</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="article">Артикул</label>
            <input type="text" name="article" id="article" class="form-control" value="{{ old('article', $product->article) }}" required>
        </div>
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-control" required>
                <option value="available" {{ old('status', $product->status) == 'available' ? 'selected' : '' }}>Доступен</option>
                <option value="unavailable" {{ old('status', $product->status) == 'unavailable' ? 'selected' : '' }}>Не доступен</option>
            </select>
        </div>
        <div class="form-group">
            <label for="color">Цвет</label>
            <input type="text" name="data[color]" id="color" class="form-control" value="{{ old('data.color', $product->data['color'] ?? '') }}">
        </div>
        <div class="form-group">
            <label for="size">Размер</label>
            <input type="text" name="data[size]" id="size" class="form-control" value="{{ old('data.size', $product->data['size'] ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
    </form>
</div>
@endsection
