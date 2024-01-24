<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CodeDiscountRequest;
use App\Models\CodeDiscount;
use Illuminate\Http\Request;

class CodeDiscountController extends Controller
{
    public function index(){
        $codes = CodeDiscount::orderBy('id', 'Desc')->paginate(5);
        return view('admin.content.Code_discount.index', ['codes' => $codes]);
    }
    public function create(){
        return view('admin.content.Code_discount.create');
    }
    public function store(CodeDiscountRequest $request){
        $input = $request->all();
        $code = new CodeDiscount();
        $code['code'] = $input['code'];
        $code['value'] = $input['value'];
        $code->save();
        return redirect()->route('admin.codediscount.index');
    }
    public function edit($id){
        $code = CodeDiscount::find($id);
        return view('admin.content.Code_discount.edit', ['code' => $code]);
    }
    public function update(CodeDiscountRequest $request, $id){
        $code = CodeDiscount::find($id);
        $input = $request->all();
        $code['code'] = $input['code'];
        $code['value'] = $input['value'];
        $code->save();
        return redirect()->route('admin.codediscount.index');
    }
    public function destroy($id){
        $code = CodeDiscount::find($id);
        $code->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }
}
