<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionType;
use Illuminate\Http\Request;

class SubscriptionTypeController extends Controller
{
    public function index()
    {
        $subscriptionTypes = SubscriptionType::all();
        return view('subscription_type.index', ['subscriptions' => $subscriptionTypes]);
    }



    public function create()
    {
        return view('subscription_type.create');
    }

    public function store(Request $request)
    {
         //dd($request-> name);
        $data = $request-> validate([
            'name'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'number_cars_allowed'=> 'required',
            'duration'=> 'required',
        ]);

        $newSubscriptionType= SubscriptionType:: create($data);
        return redirect()->route('subscription_type.index')->with('success', 'Subscription Type created successfully.');
    }

    public function view($id)
    {
        $subscriptionType = SubscriptionType::findOrFail($id);
        return view('subscription_type.view')->with('subscriptionTypes', $subscriptionType);
    }

    public function edit($id)
    {
        $subscriptionType = SubscriptionType::findOrFail($id);
        return view('subscription_type.edit')->with('subscriptionType', $subscriptionType);
    }

    public function update(subscriptionType $subscriptionType, Request $request)
    {
        $data = $request-> validate([
            'name'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'number_cars_allowed'=> 'required',
            'duration'=> 'required',
        ]);

        $subscriptionType -> update($data);

        return redirect()->route('subscription_type.index')->with('success', 'Subscription Plan updated successfully.');
    }

    public function delete($id)
    {
        $subscriptionType = SubscriptionType::findOrFail($id);
        $subscriptionType->delete();

        return redirect()->route('subscription_type.index')->with('success', 'Subscription Plan deleted successfully.');
    }
}
