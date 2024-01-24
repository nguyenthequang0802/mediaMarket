<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::orderBy('id', 'desc')->paginate(5);
        return view('admin.content.brand.index', ['brands' => $brands]);
    }
    public function create(){
        return view('admin.content.brand.create');
    }
    public function store(BrandRequest $request){
        $input = $request->all();
        $brand = new Brand();
        $brand['name'] = $input['name'];
        $brand['country'] = $input['country'];
        $brand->save();
        return redirect()->route('admin.brand.index');
    }
    public function edit($id){
        $brand = Brand::find($id);
        return view('admin.content.brand.edit', ['brand'=>$brand]);
    }
    public function update(BrandRequest $request, $id){
        $input = $request->all();
        $brand = Brand::find($id);
        $brand['name'] = $input['name'];
        $brand['country'] = $input['country'];
        $brand->save();
        return redirect()->route('admin.brand.index');
    }
    public function destroy($id){
        $brand = Brand::find($id);
        if($brand) $brand->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }
}
