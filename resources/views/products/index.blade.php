@extends('layouts.app')
@section('content')
<h1>Каталог товаров</h1><div class="filters"><input id="search" type="text" placeholder="Поиск товара..."><select id="category"><option value="">Все категории</option>@foreach($categories as $category)<option value="{{ $category->id }}">{{ $category->name }}</option>@endforeach</select><select id="sort"><option value="latest">Сначала новые</option><option value="price_asc">Сначала дешёвые</option><option value="price_desc">Сначала дорогие</option></select></div><div id="products-list" class="grid">@include('products.partials.list', ['products'=>$products])</div>
@endsection
