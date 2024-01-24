<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(){
        $categories  = ProductCategory::where('parent_id', '=', 0)->with('childs')->paginate(5);
        return view('admin.content.product_category.index', ['categories' => $categories]);
    }
    public function create(){
        $categories  = ProductCategory::where('parent_id', '=', 0)->with('childs')->get();
        return view('admin.content.product_category.create', ['categories' => $categories]);
    }
    public function store(ProductCategoryRequest $request){
        $input = $request->all();
        $category = new ProductCategory();
        $category['name'] = $input['name'];
        $category['parent_id'] = $input['ParentId'];
        $category['description'] = $input['description'];
        $category->save();
        return redirect()->route('admin.product_category.index');
    }
    public function edit($id){
        $categories  = ProductCategory::where('parent_id', '=', 0)->with('childs')->get();
        $item = ProductCategory::find($id);
        return view('admin.content.product_category.edit', ['categories' => $categories, 'item' => $item]);
    }
    public function update(ProductCategoryRequest $request, $id){
        $input = $request->all();
        $category = ProductCategory::find($id);
        $category['name'] = $input['name'];
        $category['parent_id'] = $input['ParentId'];
        $category['description'] = $input['description'];
        $category->save();
        return redirect()->route('admin.product_category.index');
    }
    public function deleteChild($id){
        $item = ProductCategory::find($id);
        if($item){
            if($item->childs){
                foreach ($item->childs as $child){
                    $this->deleteChild($child->id);
                }
            }
            $item->delete();
        }
    }
    public function destroy($id){
        $this->deleteChild($id);
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }
}
