@extends('layouts.app')
@section('content')
<section class="hero"><h1>MiniShop — аксессуары для телефонов</h1><p>Чехлы, зарядки, кабели, наушники и power bank.</p><a class="btn" href="{{ route('products.index') }}">Перейти в каталог</a></section>
<h2>Новые товары</h2><div class="grid">@foreach($products as $product) @include('products.partials.card', ['product'=>$product]) @endforeach</div>
@endsection
