<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function index() {
        $cart = session('cart', []);
        $total = $this->cartTotal($cart);
        return view('cart.index', compact('cart','total'));
    }
    public function add(Product $product) {
        if (!$product->is_active || $product->quantity <= 0) return response()->json(['message'=>'Товар недоступен'], 422);
        $cart = session('cart', []);
        $id = $product->id;
        if (isset($cart[$id])) $cart[$id]['quantity']++;
        else $cart[$id] = ['id'=>$product->id,'name'=>$product->name,'slug'=>$product->slug,'price'=>(float)$product->price,'image'=>$product->image,'quantity'=>1];
        session(['cart'=>$cart]);
        return response()->json(['message'=>'Товар добавлен в корзину','count'=>$this->cartCount($cart),'total'=>$this->cartTotal($cart)]);
    }
    public function update(Request $request, Product $product)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity'] = (int) $request->quantity;
        session()->put('cart', $cart);
    }

    return redirect()
        ->route('cart.index')
        ->with('success', 'Количество товара обновлено.');
}
    public function remove(Product $product) {
        $cart = session('cart', []); unset($cart[$product->id]); session(['cart'=>$cart]);
        return response()->json(['message'=>'Товар удалён','count'=>$this->cartCount($cart),'total'=>$this->cartTotal($cart)]);
    }
    private function cartCount(array $cart): int { return array_sum(array_column($cart, 'quantity')); }
    private function cartTotal(array $cart): float { return array_reduce($cart, fn($sum,$item)=>$sum + $item['price']*$item['quantity'], 0); }
}
