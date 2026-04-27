<div class="card product-card">
    @if($product->image)
        <img
            src="{{ asset($product->image) }}"
            alt="{{ $product->name }}"
            class="product-img"
        >
    @else
        <div class="image-placeholder">Фото</div>
    @endif

    <h3>
        <a href="{{ route('products.show', $product) }}">
            {{ $product->name }}
        </a>
    </h3>

    <p>{{ $product->category->name }}</p>

    <div class="product-bottom">
        <strong>{{ number_format($product->price, 0, '.', ' ') }} ₽</strong>

        <form action="{{ route('cart.add', $product) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-small">
                В корзину
            </button>
        </form>
    </div>
</div>