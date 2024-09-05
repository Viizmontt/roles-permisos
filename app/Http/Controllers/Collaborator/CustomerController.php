<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller{
    
    public function index(){
        $customers = Customer::all();
        return view('collaborator.customer.customers', compact('customers'));
    }

    public function create(){
        $communities = Community::all();
        return view('collaborator.customer.create_customer', compact('communities'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name_customer' => 'required|string|max:255',
            'account_customer' => 'required|string|max:255|unique:customers,account',
            'community' => 'required|exists:communities,id',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $customer = new Customer();
        $customer->name = $request->input('name_customer');
        $customer->account = $request->input('account_customer');
        $customer->id_community = $request->input('community');
        $customer->save();
        return redirect()->route('customer.index')->with('success', 'Cliente creado exitosamente.');
    }

    public function show(string $id){}

    public function edit($id){
        $customer = Customer::findOrFail($id);
        $communities = Community::all();
        return view('collaborator.customer.edit_customer', compact('customer', 'communities'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name_customer' => 'required|string|max:255',
            'account_customer' => 'required|string|max:255|unique:customers,account,' . $id,
            'community' => 'required|exists:communities,id',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $customer = Customer::findOrFail($id);
        $customer->name = $request->input('name_customer');
        $customer->account = $request->input('account_customer');
        $customer->id_community = $request->input('community');
        $customer->save();
        return redirect()->route('customer.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
