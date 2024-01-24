<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\DiscountOfProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.content.product.index', ['products' => $products]);
    }
    public function create(){
        $discounts = DiscountOfProduct::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();
        return view('admin.content.product.create', ['discounts' => $discounts, 'brands' => $brands, 'categories' => $categories]);
    }
    public function store(ProductRequest $request){
        $input = $request->all();
        $product = new Product();
        $product['name'] = $input['name'];
        $product['description'] = $input['description'];
        $product['price'] = $input['price'];
        $product['quantity'] = $input['quantity'];
        $product['status'] = $input['status'];
        $product['discount_id'] = $input['discount'];
        $product['category_id'] = $input['category'];
        $product['brand_id'] = $input['brand'];
        $product->save();
        return redirect()->route('admin.product.index');
    }
    public function edit($id){
        $item = Product::find($id);
        $discounts = DiscountOfProduct::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();
        return view('admin.content.product.edit', ['item' => $item ,'discounts' => $discounts, 'brands' => $brands, 'categories' => $categories]);
    }
    public function update(ProductRequest $request, $id){
        $input = $request->all();
        $product = Product::find($id);
        $product['name'] = $input['name'];
        $product['description'] = $input['description'];
        $product['price'] = $input['price'];
        $product['quantity'] = $input['quantity'];
        $product['status'] = $input['status'];
        $product['discount_id'] = $input['discount'];
        $product['category_id'] = $input['category'];
        $product['brand_id'] = $input['brand'];
        $product->save();
        return redirect()->route('admin.product.index');
    }
    public function destroy($id){
        $product = Product::find($id);
        if ($product) $product->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }
}
