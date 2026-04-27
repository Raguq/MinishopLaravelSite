<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $categories = Category::orderBy('name')->get();
        $products = Product::with('category')->where('is_active', true)->latest()->paginate(12);
        return view('products.index', compact('products','categories'));
    }
    public function search(Request $request) {
        $query = Product::with('category')->where('is_active', true);
        if ($request->filled('search')) {
            $s = $request->get('search');
            $query->where(fn($q)=>$q->where('name','like',"%{$s}%")->orWhere('description','like',"%{$s}%"));
        }
        if ($request->filled('category_id')) $query->where('category_id', $request->get('category_id'));
        match($request->get('sort')) {
            'price_asc' => $query->orderBy('price'),
            'price_desc' => $query->orderByDesc('price'),
            default => $query->latest()
        };
        $products = $query->get();
        return view('products.partials.list', compact('products'));
    }
    public function show(Product $product) {
        abort_unless($product->is_active, 404);
        return view('products.show', compact('product'));
    }
}
