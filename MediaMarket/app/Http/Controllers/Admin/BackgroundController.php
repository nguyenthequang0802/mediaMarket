<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackgroundRequest;
use App\Models\Background;
use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    public function index(){
        $bgs = Background::orderBy('id', 'Desc')->paginate(5);
        return view('admin.content.background.index', ['bgs' => $bgs]);
    }
    public function create(){
        return view('admin.content.background.create');
    }
    public function store(BackgroundRequest $request){
        $input = $request->all();
        $bg = new Background();
        $bg['name'] = $input['name'];
        $bg['description'] = $input['description'];
        $bg['url'] = $input['image'];
        $bg->save();
        return redirect()->route('admin.background.index');
    }
    public function edit($id){
        $bg = Background::find($id);
        return view('admin.content.background.edit', ['bg' => $bg]);
    }
    public function update(BackgroundRequest $request,$id){
        $input = $request->all();
        $bg = Background::find($id);
        $bg['name'] = $input['name'];
        $bg['description'] = $input['description'];
        $bg['url'] = $input['image'];
        $bg->save();
        return redirect()->route('admin.background.index');
    }
    public function destroy($id){
        $bg = Background::find($id);
        if ($bg) $bg->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }
}
