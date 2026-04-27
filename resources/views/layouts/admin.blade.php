@extends('layouts.app')
@section('content')
<div class="admin-layout"><aside class="admin-menu"><a href="{{ route('admin.dashboard') }}">Dashboard</a><a href="{{ route('admin.products.index') }}">Товары</a><a href="{{ route('admin.categories.index') }}">Категории</a><a href="{{ route('admin.orders.index') }}">Заказы</a><a href="{{ route('home') }}">На сайт</a></aside><section class="admin-content">@yield('admin')</section></div>
@endsection
