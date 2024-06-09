@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="card bg-dark text-white">
    <div class="card-body">
        <h2 class="card-title">{{ $product->name }}</h2>
        <p class="card-text"><strong>Артикул:</strong> {{ $product->article }}</p>
        <p class="card-text"><strong>Название:</strong> {{ $product->name }}</p>
        <p class="card-text"><strong>Статус:</strong> {{ $product->status == 'available' ? 'Доступен' : 'Не доступен' }}</p>
        <p class="card-text"><strong>Атрибуты:</strong></p>
        <ul>
            @if(is_array($product->data))
                @foreach($product->data as $key => $value)
                    <li>{{ $key }}: {{ $value }}</li>
                @endforeach
            @endif
        </ul>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Редактировать</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
</div>
@endsection
