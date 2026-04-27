@extends('layouts.admin')
@section('admin')
<h1>Товары</h1><a class="btn" href="{{ route('admin.products.create') }}">Добавить товар</a><table class="table"><tr><th>ID</th><th>Название</th><th>Категория</th><th>Цена</th><th>Кол-во</th><th>Активен</th><th></th></tr>@foreach($products as $product)<tr><td>{{ $product->id }}</td><td>{{ $product->name }}</td><td>{{ $product->category->name }}</td><td>{{ $product->price }} ₽</td><td>{{ $product->quantity }}</td><td>{{ $product->is_active ? 'Да' : 'Нет' }}</td><td><a href="{{ route('admin.products.edit', $product) }}">Редактировать</a><form class="inline" method="POST" action="{{ route('admin.products.destroy', $product) }}">@csrf @method('DELETE')<button>Удалить</button></form></td></tr>@endforeach</table>
@endsection
