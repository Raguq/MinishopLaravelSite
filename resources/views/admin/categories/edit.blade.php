@extends('layouts.admin')
@section('admin')
<h1>Редактировать категорию</h1><form method="POST" action="{{ route('admin.categories.update', $category) }}" class="form">@csrf @method('PUT')<input name="name" value="{{ $category->name }}" required><button class="btn">Сохранить</button></form>
@endsection
