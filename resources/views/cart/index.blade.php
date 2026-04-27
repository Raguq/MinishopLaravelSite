@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="cart-page">
        <h1 class="page-title">Корзина</h1>

        @if(empty($cart))
            <div class="empty-card">
                <p>Корзина пуста.</p>
                <a href="{{ route('products.index') }}" class="btn">Перейти в каталог</a>
            </div>
        @else
            <div class="cart-card">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Товар</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Сумма</th>
                            <th>Действие</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($cart as $id => $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['price'] }} ₽</td>
                                <td>
                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="quantity-form">
                                        @csrf
                                        <input
                                            type="number"
                                            name="quantity"
                                            value="{{ $item['quantity'] }}"
                                            min="1"
                                            class="quantity-input"
                                        >
                                        <button type="submit" class="btn btn-small">Обновить</button>
                                    </form>
                                </td>
                                <td>{{ $item['price'] * $item['quantity'] }} ₽</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-small btn-danger">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart-summary">
                <div class="summary-row">
                    <span>Итого:</span>
                    <strong>{{ $total }} ₽</strong>
                </div>
            </div>

            @auth
                <div class="checkout-card">
                    <h2>Оформление заказа</h2>

                    <form action="{{ route('orders.store') }}" method="POST" class="checkout-form">
                        @csrf

                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ auth()->user()->name }}"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                placeholder="+7 999 123-45-67"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="address">Адрес</label>
                            <textarea
                                id="address"
                                name="address"
                                rows="4"
                                placeholder="Город, улица, дом, квартира"
                                required
                            ></textarea>
                        </div>

                        <button type="submit" class="btn checkout-btn">
                            Оформить заказ
                        </button>
                    </form>
                </div>
            @else
                <div class="checkout-card">
                    <p>Чтобы оформить заказ, нужно войти в аккаунт.</p>
                    <a href="{{ route('login') }}" class="btn">Войти</a>
                </div>
            @endauth
        @endif
    </div>
</div>
@endsection