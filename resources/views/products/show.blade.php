@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mx-auto mt-2 p-4">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg max-w-md mx-auto text-white">
        <h2 class="text-2xl font-bold mb-4">{{ $product->name }}</h2>
        <p class="mb-2"><span class="font-semibold">Артикул:</span> {{ $product->article }}</p>
        <p class="mb-2"><span class="font-semibold">Название:</span> {{ $product->name }}</p>
        <p class="mb-2"><span class="font-semibold">Статус:</span> {{ $product->status == 'available' ? 'Доступен' : 'Не доступен' }}</p>
        <p class="mb-2 font-semibold">Атрибуты:</p>
        <ul class="list-disc list-inside mb-4">
            @if(is_array($product->data))
                @foreach($product->data as $key => $value)
                    <li>{{ $key }}: {{ $value }}</li>
                @endforeach
            @endif
        </ul>
        <div class="flex justify-between">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Редактировать</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Удалить</button>
            </form>
        </div>
    </div>
</div>
@endsection
