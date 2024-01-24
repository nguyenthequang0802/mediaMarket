<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountOfProductRequest;
use App\Models\DiscountOfProduct;
use Illuminate\Http\Request;

class DiscountOfProductController extends Controller
{
    public function index(){
        $codes = DiscountOfProduct::orderBy('id', 'Desc')->paginate(5);
        return view('admin.content.discount_of_product.index', ['codes' => $codes]);
    }
    public function create(){
        return view('admin.content.discount_of_product.create');
    }
    public function store(DiscountOfProductRequest $request){
        $input = $request->all();
        $code = new DiscountOfProduct();
        $code['code'] = $input['code'];
        $code['value'] = $input['value'];
        $code->save();
        return redirect()->route('admin.discount_product.index');
    }
    public function edit($id){
        $code = DiscountOfProduct::find($id);
        return view('admin.content.discount_of_product.edit', ['code' => $code]);
    }
    public function update(DiscountOfProductRequest $request, $id){
        $code = DiscountOfProduct::find($id);
        $input = $request->all();
        $code['code'] = $input['code'];
        $code['value'] = $input['value'];
        $code->save();
        return redirect()->route('admin.discount_product.index');
    }
    public function destroy($id){
        $code = DiscountOfProduct::find($id);
        $code->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }
}
