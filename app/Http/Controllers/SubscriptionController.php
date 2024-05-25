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

<<<<<<< HEAD
            return redirect()->route('customer.view', ['customer'=>$customer])->with('success', 'Subscription created successfully.');
        }
=======
        return redirect()->route('customer.view', ['customer' => $customer])->with('success', 'Subscription created successfully.');
    }
>>>>>>> af5e58c2e61b2bbfbd15d71ecd41e05cc9820569

    public function show($id)
    {
        $subscriptionType = SubscriptionType::findOrFail($id);
        return view('subscription_types.show', compact('subscriptionType'));
    }

    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscriptionType = SubscriptionType::all();
        $customer = Customer::all();
        return view('subscription.edit', compact('subscription', 'subscriptionType', 'customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subscriptiontype_id' => 'required|exists:subscription_type,id',
            'customer_id' => 'required|exists:customer,id',
            'number_of_wash' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());

        return redirect()->route('subscription.index')->with('success', 'Subscription updated successfully.');
    }

    public function delete($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return redirect()->route('subscription.index')->with('success', 'Subscription deleted successfully.');
    }
}
