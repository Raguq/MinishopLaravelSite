<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller {
    public function index(){ $products=Product::with('category')->latest()->get(); return view('admin.products.index', compact('products')); }
    public function create(){ $categories=Category::orderBy('name')->get(); return view('admin.products.create', compact('categories')); }
    public function store(Request $request){ $data=$this->validated($request); $data['slug']=Str::slug($data['name']).'-'.time(); $data['is_active']=$request->boolean('is_active'); if($request->hasFile('image')) $data['image']=$request->file('image')->store('products','public'); Product::create($data); return redirect()->route('admin.products.index')->with('success','Товар создан'); }
    public function edit(Product $product){ $categories=Category::orderBy('name')->get(); return view('admin.products.edit', compact('product','categories')); }
    public function update(Request $request, Product $product){ $data=$this->validated($request); $data['is_active']=$request->boolean('is_active'); if($request->hasFile('image')){ if($product->image) Storage::disk('public')->delete($product->image); $data['image']=$request->file('image')->store('products','public'); } $product->update($data); return redirect()->route('admin.products.index')->with('success','Товар обновлён'); }
    public function destroy(Product $product){ if($product->image) Storage::disk('public')->delete($product->image); $product->delete(); return back()->with('success','Товар удалён'); }
    private function validated(Request $request): array { return $request->validate(['category_id'=>'required|exists:categories,id','name'=>'required|string|max:255','description'=>'required|string','price'=>'required|numeric|min:0','quantity'=>'required|integer|min:0','image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048']); }
}
