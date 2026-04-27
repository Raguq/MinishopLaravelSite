<?php
namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller {
    public function index() {
        $orders = auth()->user()->orders()->with('items')->latest()->get();
        return view('orders.index', compact('orders'));
    }
    public function store(Request $request) {
        $validated = $request->validate(['name'=>'required|string|max:255','phone'=>'required|string|max:25','address'=>'required|string|max:500']);
        $cart = session('cart', []);
        if (empty($cart)) return back()->withErrors(['cart'=>'Корзина пуста']);
        DB::transaction(function() use ($validated,$cart) {
            $total = array_reduce($cart, fn($sum,$item)=>$sum + $item['price']*$item['quantity'], 0);
            $order = Order::create(['user_id'=>auth()->id(),'name'=>$validated['name'],'phone'=>$validated['phone'],'address'=>$validated['address'],'total_price'=>$total,'status'=>'new']);
            foreach ($cart as $item) $order->items()->create(['product_id'=>$item['id'],'product_name'=>$item['name'],'price'=>$item['price'],'quantity'=>$item['quantity']]);
        });
        session()->forget('cart');
        return redirect()->route('orders.index')->with('success','Заказ оформлен');
    }
}
