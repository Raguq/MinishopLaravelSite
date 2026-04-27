@extends('layouts.admin')
@section('admin')
<h1>Редактировать товар</h1>@include('admin.products.form', ['action'=>route('admin.products.update', $product), 'method'=>'PUT', 'product'=>$product])
@endsection
