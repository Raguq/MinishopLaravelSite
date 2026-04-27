@extends('layouts.admin')
@section('admin')
<h1>Админ-панель</h1><div class="stats"><div class="card"><h3>Товары</h3><p>{{ $productsCount }}</p></div><div class="card"><h3>Заказы</h3><p>{{ $ordersCount }}</p></div><div class="card"><h3>Пользователи</h3><p>{{ $usersCount }}</p></div></div><h2>Последние заказы</h2><table class="table"><tr><th>ID</th><th>Клиент</th><th>Сумма</th><th>Статус</th></tr>@foreach($latestOrders as $order)<tr><td>{{ $order->id }}</td><td>{{ $order->name }}</td><td>{{ $order->total_price }} ₽</td><td>{{ $order->status }}</td></tr>@endforeach</table>
@endsection
