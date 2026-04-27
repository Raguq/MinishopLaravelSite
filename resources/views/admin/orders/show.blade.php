@extends('layouts.admin')
@section('admin')
<h1>Заказ #{{ $order->id }}</h1><p>Клиент: {{ $order->name }}</p><p>Телефон: {{ $order->phone }}</p><p>Адрес: {{ $order->address }}</p><p>Статус: {{ $order->status }}</p><table class="table"><tr><th>Товар</th><th>Цена</th><th>Количество</th><th>Сумма</th></tr>@foreach($order->items as $item)<tr><td>{{ $item->product_name }}</td><td>{{ $item->price }} ₽</td><td>{{ $item->quantity }}</td><td>{{ $item->price * $item->quantity }} ₽</td></tr>@endforeach</table>
@endsection
