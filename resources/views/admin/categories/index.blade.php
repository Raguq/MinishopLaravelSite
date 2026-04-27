@extends('layouts.admin')
@section('admin')
<h1>Категории</h1><a class="btn" href="{{ route('admin.categories.create') }}">Добавить</a><table class="table"><tr><th>ID</th><th>Название</th><th>Товаров</th><th></th></tr>@foreach($categories as $category)<tr><td>{{ $category->id }}</td><td>{{ $category->name }}</td><td>{{ $category->products_count }}</td><td><a href="{{ route('admin.categories.edit', $category) }}">Редактировать</a><form class="inline" method="POST" action="{{ route('admin.categories.destroy', $category) }}">@csrf @method('DELETE')<button>Удалить</button></form></td></tr>@endforeach</table>
@endsection
