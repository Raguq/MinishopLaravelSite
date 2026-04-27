@extends('layouts.admin')
@section('admin')
<h1>Добавить категорию</h1><form method="POST" action="{{ route('admin.categories.store') }}" class="form">@csrf<input name="name" placeholder="Название" required><button class="btn">Сохранить</button></form>
@endsection
