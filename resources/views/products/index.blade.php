@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-red-600">ПРОДУКТЫ</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Добавить
    </a>
</div>

<table class="table-auto w-full border-collapse border border-gray-200">
    <thead>
        <tr>
            <th class="border border-gray-300 p-2 bg-gray-100">АРТИКУЛ</th>
            <th class="border border-gray-300 p-2 bg-gray-100">НАЗВАНИЕ</th>
            <th class="border border-gray-300 p-2 bg-gray-100">СТАТУС</th>
            <th class="border border-gray-300 p-2 bg-gray-100">АТРИБУТЫ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td class="border border-gray-300 p-2">{{ $product->article }}</td>
            <td class="border border-gray-300 p-2">
                <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:text-blue-700">
                    {{ $product->name }}
                </a>
            </td>
            <td class="border border-gray-300 p-2">{{ $product->status == 'available' ? 'Доступен' : 'Не доступен' }}</td>
            <td class="border border-gray-300 p-2">
                @if(is_array($product->data))
                    @foreach($product->data as $key => $value)
                        {{ $key }}: {{ $value }}<br>
                    @endforeach
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
