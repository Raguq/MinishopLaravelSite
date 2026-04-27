@extends('layouts.app')
@section('content')
<h1>Мои заказы</h1>@forelse($orders as $order)<div class="card full"><h3>Заказ #{{ $order->id }} — {{ $order->status }}</h3><p>Сумма: {{ $order->total_price }} ₽</p><ul>@foreach($order->items as $item)<li>{{ $item->product_name }} × {{ $item->quantity }}</li>@endforeach</ul></div>@empty<p>У вас пока нет заказов.</p>@endforelse
@endsection
