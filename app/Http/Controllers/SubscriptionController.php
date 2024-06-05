<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customer = Customer::all();
    return view('subscription.index', ['customer'=> $customer]);

    }




    public function create(Customer $customer)
    {

        $subscriptionTypes = SubscriptionType::all();
        // $customer = Customer::all();
        return view('subscription.create', compact('subscriptionTypes', 'customer'));
    }

    // public function edit(customer $customer)
    // {

    //     $subscriptionTypes = SubscriptionType::all();
    //     return view('subscription.edit', compact('subscriptionTypes', 'customer'));
    //     //dd($customer);

    // }

    public function edit(Customer $customer, $id)
{
    // Find the subscription by its ID
    $subscription = Subscription::findOrFail($id);
    // Get all subscription types
    $subscriptionTypes = SubscriptionType::all();
    // Return the view with the subscription, subscription types, and customer
    return view('subscription.edit', [
        'subscription' => $subscription,
        'subscriptionTypes' => $subscriptionTypes,
        'customer' => $customer,
    ]);
}



    public function customersubscription(Customer $customer)
    {
        //
        $subscriptionTypes = SubscriptionType::all();
        return view('subscription.create')
            ->with('subscriptionTypes', $subscriptionTypes)
            ->with('customer', $customer);
    }


    public function store(Request $request, Customer $customer)
    {

        $request->validate([
            'subscription_types_id' => 'required|exists:subscription_types,id',
            'customers_id' => 'required|exists:customers,id',
            'number_of_wash' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $newSubscription = subscription::create($request->all());

        return redirect()->route('customer.view', ['customer' => $customer])->with('success', 'Subscription created successfully.');
    }



    public function update(Request $request, Subscription $subscription)
{
    $request->validate([
        'subscription_types_id' => 'required|exists:subscription_types,id',
        'customers_id' => 'required|exists:customers,id',
        'number_of_wash' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $subscription->update($request->all());

    return redirect()->route('customers.view', ['customer' => $subscription->customers_id])
                     ->with('success', 'Subscription updated successfully.');
}


    public function delete($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return redirect()->route('subscription.index')->with('success', 'Subscription deleted successfully.');
    }
}
