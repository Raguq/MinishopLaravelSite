@extends('layouts.app')
@section('content')
<div class="product-page"><div class="image-placeholder big">Фото товара</div><div><h1>{{ $product->name }}</h1><p class="muted">Категория: {{ $product->category->name }}</p><p>{{ $product->description }}</p><h2>{{ number_format($product->price, 0, '.', ' ') }} ₽</h2><button class="btn add-to-cart" data-url="{{ route('cart.add', $product) }}">Добавить в корзину</button></div></div>
@endsection
