<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionType;
use App\Models\Service;
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
        $services = Service::all();
        return view('subscription_type.create', compact('services'));

    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'number_cars_allowed' => 'required',
        'duration' => 'required',
        'services' => 'array',
        'services.*' => 'exists:services,id',
    ]);

    $newSubscriptionType = SubscriptionType::create($data);

    // Sync the services
    $newSubscriptionType->services()->sync($request->services);

    return redirect()->route('subscription_type.index')->with('success', 'Subscription Type created successfully.');
}


    public function view($id)
    {
        $subscriptionType = SubscriptionType::findOrFail($id);
        return view('subscription_type.view')->with('subscriptionTypes', $subscriptionType);
    }

    public function edit($id)
    {
        $subscriptionType = SubscriptionType::with('services')->findOrFail($id);
        $services = Service::all(); // Assuming you have a Service model and table
        return view('subscription_type.edit', compact('subscriptionType', 'services'));
        // return view('subscription_type.edit')->with('subscriptionType', $subscriptionType);
    }

    public function update(subscriptionType $subscriptionType, Request $request)
    {
        $data = $request-> validate([
            'name'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'number_cars_allowed'=> 'required',
            'duration'=> 'required',
            'services' => 'array',
            'services.*' => 'exists:services,id',
        ]);

        $subscriptionType -> update($data);

         // Sync the services
        $subscriptionType->services()->sync($request->services);

        return redirect()->route('subscription_type.index')->with('success', 'Subscription Plan updated successfully.');
    }

    public function delete($id)
    {
        $subscriptionType = SubscriptionType::findOrFail($id);
        $subscriptionType->delete();

        return redirect()->route('subscription_type.index')->with('success', 'Subscription Plan deleted successfully.');
    }
}
