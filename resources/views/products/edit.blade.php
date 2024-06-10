@extends('layouts.app')

@section('title', 'Редактировать продукт')

@section('content')
<div class="container mx-auto mt-2 p-4">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg max-w-md mx-auto text-white">
        <h3 class="mb-4 text-2xl font-bold">Редактировать продукт</h3>
        @if ($errors->any())
            <div class="alert alert-danger bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Ошибка!</strong>
                <span class="block sm:inline">Что-то пошло не так.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="article" class="block text-gray-300 text-sm font-bold mb-2">Артикул</label>
                <input type="text" name="article" id="article" class="shadow appearance-none border rounded w-full py-2 px-3 bg-white text-black leading-tight focus:outline-none focus:shadow-outline" value="{{ old('article', $product->article) }}" {{ config('products.role') !== auth()->user()->role ? 'readonly' : '' }} required>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-300 text-sm font-bold mb-2">Название</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 bg-white text-black leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-300 text-sm font-bold mb-2">Статус</label>
                <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 bg-white text-black leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="available" {{ old('status', $product->status) == 'available' ? 'selected' : '' }}>Доступен</option>
                    <option value="unavailable" {{ old('status', $product->status) == 'unavailable' ? 'selected' : '' }}>Не доступен</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="color" class="block text-gray-300 text-sm font-bold mb-2">Цвет</label>
                <input type="text" name="data[color]" id="color" class="shadow appearance-none border rounded w-full py-2 px-3 bg-white text-black leading-tight focus:outline-none focus:shadow-outline" value="{{ old('data.color', $product->data['color'] ?? '') }}">
            </div>
            <div class="mb-4">
                <label for="size" class="block text-gray-300 text-sm font-bold mb-2">Размер</label>
                <input type="text" name="data[size]" id="size" class="shadow appearance-none border rounded w-full py-2 px-3 bg-white text-black leading-tight focus:outline-none focus:shadow-outline" value="{{ old('data.size', $product->data['size'] ?? '') }}">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Сохранить
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
