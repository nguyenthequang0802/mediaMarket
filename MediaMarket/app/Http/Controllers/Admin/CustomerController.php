<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::orderBy('id', 'Desc')->paginate(5);
        return view('admin.content.customer.index', ['customers' => $customers]);
    }
    public function create(){
        return view('admin.content.customer.create');
    }
    public function store(CustomerRequest $request){
        $input = $request->all();
        $customer = new Customer();
        $customer['name'] = $input['name'];
        $gender = $input['customRadio1'];
        if($gender === 'male'){
            $customer['gender'] = 'male';
        } elseif ($gender === 'female'){
            $customer['gender'] = 'female';
        }
        $customer['date_of_birth'] = $input['birth'];
        $customer['email'] = $input['email'];
        $customer['phone_number'] = $input['phone'];
        $customer['address'] = $input['add'];
        $customer->save();
        return redirect()->route('admin.customer.index');
    }
    public function edit($id){
        $customer = Customer::find($id);
        return view('admin.content.customer.edit', ['customer' => $customer]);
    }
    public function update(CustomerRequest $request,$id){
        $input = $request->all();
        $customer = Customer::find($id);
        $customer['name'] = $input['name'];
        $gender = $input['customRadio1'];
        if($gender === 'male'){
            $customer['gender'] = 'male';
        } elseif ($gender === 'female'){
            $customer['gender'] = 'female';
        }
        $customer['date_of_birth'] = $input['birth'];
        $customer['email'] = $input['email'];
        $customer['phone_number'] = $input['phone'];
        $customer['address'] = $input['add'];
        $customer->save();
        return redirect()->route('admin.customer.index');
    }
    public function destroy($id){
        $customer = Customer::find($id);
        if ($customer) $customer->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }
}
