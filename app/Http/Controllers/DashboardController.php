<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Subscription;
use App\Models\SubscriptionType;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch statistics
        $totalCustomers = Customer::count();
        $totalSubscriptions = Subscription::count();
        $totalRevenue = SubscriptionType::sum('price');
        $otherStatistic = 123; // Example statistic

        // Fetch all customers with their subscriptions and cars
        $customers = Customer::with(['subscriptions.subscriptionType', 'cars', 'sub'])->get();

        return view('dashboard', [
            'totalCustomers' => $totalCustomers,
            'totalSubscriptions' => $totalSubscriptions,
            'totalRevenue' => $totalRevenue,
            'otherStatistic' => $otherStatistic,
            'customers' => $customers
        ])->with('totalCustomers', $totalCustomers);
    }

}
