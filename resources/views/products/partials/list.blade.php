@forelse($products as $product) @include('products.partials.card', ['product'=>$product]) @empty <p>Товары не найдены.</p> @endforelse
