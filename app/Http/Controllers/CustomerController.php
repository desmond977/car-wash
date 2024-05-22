<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Subscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display the user's profile form.
     */


    public function index()
    {
        //
        $customer = Customer::all(); // Retrieve all cars from the database
    return view('customer.index', ['customer'=> $customer]);

    }

    public function create()
    {
        //
        return view('customer.create');
    }

    public function store(Request $request)
    {
        //dd($request-> name);
        $data = $request-> validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'phone_number'=> 'required',
            'email'=> 'required',

        ]);
        $newCustomer= customer:: create($data);

        return redirect(route('customer.index'))->with('success', 'Customer Added successfully');

    }

    public function edit(customer $customer)
    {
        return view('customer.edit')
            ->with('customer', $customer);
        //dd($customer);

    }

    public function update(Customer $customer, Request $request)
    {
        //
        // return $request;
        $data = $request-> validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'phone_number'=> 'required',
            'email'=> 'required',

        ]);

        $customer ->update($data);

        return redirect(route('customer.index'))->with('success', 'Customer Updated Succesfuly');
    }

    /**
     * Delete the user's account.
     */
    public function delete(Customer $customer)
    {
        //
        $customer->delete();
    return redirect()->route('customer.index')->with('success', 'Customer deleted successfully');
    }

    public function view($id)
    {
        // return $id;
        $customer = Customer::with(['subscriptions.subscriptionType', 'cars', 'sub'])
            ->where('id', $id)->first();
        // $subscriptions = Subscription::where('customers_id', $id)->get();
        // return $subscriptions;
        // return $customer;
        return view('customer.view')->with('customer', $customer);

    }
}
