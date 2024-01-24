<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'Desc')->paginate(5);
        return view('admin.content.user.index', ['users' => $users]);
    }
    public function create(){
        return view('admin.content.user.create');
    }
    public function store(UserRequest $request){
        $input = $request->all();
        $user = new User();
        $user['name'] = $input['name'];
        $gender = $input['customRadio1'];
        if($gender === 'male'){
            $user['gender'] = 'male';
        } elseif ($gender === 'female'){
            $user['gender'] = 'female';
        }
        $user['date_of_birth'] = $input['birth'];
        $user['email'] = $input['email'];
        $user['phone_number'] = $input['phone'];
        $user['address'] = $input['add'];
        $user['role'] = $input['role'];
        $user['password'] = $input['pass'];
        $user->save();
        return redirect()->route('admin.user.index');
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.content.user.edit', ['user' => $user]);
    }
    public function update(UserRequest $request,$id){
        $input = $request->all();
        $user = User::find($id);
        $user['name'] = $input['name'];
        $gender = $input['customRadio1'];
        if($gender === 'male'){
            $user['gender'] = 'male';
        } elseif ($gender === 'female'){
            $user['gender'] = 'female';
        }
        $user['date_of_birth'] = $input['birth'];
        $user['email'] = $input['email'];
        $user['phone_number'] = $input['phone'];
        $user['address'] = $input['add'];
        $user['role'] = $input['role'];
        $user['password'] = $input['pass'];
        $user->save();
        return redirect()->route('admin.user.index');
    }
    public function destroy($id){
        $customer = User::find($id);
        if ($customer) $customer->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }
}
