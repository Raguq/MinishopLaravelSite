@extends('layouts.admin')
@section('admin')
<h1>Заказы</h1><table class="table"><tr><th>ID</th><th>Клиент</th><th>Телефон</th><th>Сумма</th><th>Статус</th><th></th></tr>@foreach($orders as $order)<tr><td>{{ $order->id }}</td><td>{{ $order->name }}</td><td>{{ $order->phone }}</td><td>{{ $order->total_price }} ₽</td><td><select class="order-status" data-url="{{ route('admin.orders.status', $order) }}">@foreach(['new'=>'Новый','processing'=>'В обработке','completed'=>'Завершён','cancelled'=>'Отменён'] as $key=>$label)<option value="{{ $key }}" @selected($order->status === $key)>{{ $label }}</option>@endforeach</select></td><td><a href="{{ route('admin.orders.show', $order) }}">Открыть</a></td></tr>@endforeach</table>
@endsection
