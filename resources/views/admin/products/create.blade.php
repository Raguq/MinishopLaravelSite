@extends('layouts.admin')
@section('admin')
<h1>Добавить товар</h1>@include('admin.products.form', ['action'=>route('admin.products.store'), 'method'=>'POST', 'product'=>null])
@endsection
