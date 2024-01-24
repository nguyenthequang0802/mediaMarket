<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index(){
        $menus  = Menu::where('parent_id', '=', 0)->with('childs')->paginate(5);
        return view('admin.content.menu.index', ['menus' => $menus]);
    }
    public function create(){
        $menus  = Menu::where('parent_id', '=', 0)->with('childs')->get();
        return view('admin.content.menu.create', ['menus' => $menus]);
    }
    public function store(MenuRequest $request){
        $input = $request->all();
        $menu = new Menu();
        $menu['name'] = $input['name'];
        $menu['slug'] = Str::slug($input['name']);
        $menu['parent_id'] = $input['ParentId'];
        $menu->save();
        return redirect()->route('admin.menu.index');
    }
    public function edit($id){
        $menus  = Menu::where('parent_id', '=', 0)->with('childs')->get();
        $item = Menu::find($id);
        return view('admin.content.menu.edit', ['menus' => $menus, 'item' => $item]);
    }
    public function update(MenuRequest $request, $id){
        $input = $request->all();
        $menu = Menu::find($id);
        $menu['name'] = $input['name'];
        $menu['slug'] = Str::slug($input['name']);
        $menu['parent_id'] = $input['ParentId'];
        $menu->save();
        return redirect()->route('admin.menu.index');
    }
    public function deleteChild($id){
        $item = Menu::find($id);
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
