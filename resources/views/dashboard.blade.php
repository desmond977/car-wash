<!-- resources/views/dashboard.blade.php -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

{{-- <x-app-layout> --}}
    @extends('layouts.dashboard')
    @section('content')

        <!-- Include the sidebar component -->
        {{-- <x-sidebar /> --}}

        <!-- Main content -->
        <div class="">
            <div class="container mx-auto">
                <h1 >Dashboard</h1>

               <!-- Statistics -->
<div class="row mb-4">
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <div class="bg-white shadow rounded-lg border p-3 d-flex align-items-center">
            <i class="bi bi-people-fill display-6 text-primary me-3"></i>
            <div>
                <h2 class="h4 font-weight-normal mb-0">Total Customers</h2>
                <p class="display-6 mb-0">{{ $totalCustomers }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <div class="bg-white shadow rounded-lg border p-3 d-flex align-items-center">
            <i class="bi bi-card-checklist display-6 text-success me-3"></i>
            <div>
                <h2 class="h4 font-weight-normal mb-0">Total Subscriptions</h2>
                <p class="display-6 mb-0">{{ $totalSubscriptions }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <div class="bg-white shadow rounded-lg border p-3 d-flex align-items-center">
            <i class="bi bi-currency-dollar display-6 text-warning me-3"></i>
            <div>
                <h2 class="h4 font-weight-normal mb-0">Total Revenue</h2>
                <p class="display-6 mb-0">${{ $totalRevenue }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <div class="bg-white shadow rounded-lg border p-3 d-flex align-items-center">
            <i class="bi bi-graph-up-arrow display-6 text-info me-3"></i>
            <div>
                <h2 class="h4 font-weight-normal mb-0">Remaining Wash</h2>
                <p class="display-6 mb-0">{{ $otherStatistic }}</p>
            </div>
        </div>
    </div>
</div>



                <!-- Customers List -->
                <h2 class="text-2xl font-bold mb-4">Customers</h2>
                <div class="bg-white shadow rounded-lg p-4 border border-primary">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-light">
                                    <th class="py-3 px-4">Customer Details</th>
                                    <th class="py-3 px-4">Subscriptions</th>
                                    <th class="py-3 px-4">Cars</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td class="py-4 px-4">
                                            <p class="font-weight-bold">{{ $customer->first_name }} {{ $customer->last_name }}</p>
                                            <p><strong>Email:</strong> {{ $customer->email }}</p>
                                            <p><strong>Phone:</strong> {{ $customer->phone_number }}</p>
                                        </td>
                                        <td class="py-4 px-4">
                                            @if ($customer->subscriptions->isEmpty())
                                                <p>No subscriptions found.</p>
                                            @else
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th class="py-2 px-3">Type</th>
                                                                <th class="py-2 px-3">Washes</th>
                                                                <th class="py-2 px-3">Start Date</th>
                                                                <th class="py-2 px-3">End Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($customer->subscriptions as $subscription)
                                                                <tr>
                                                                    <td class="py-2 px-2">{{ $subscription->subscriptionType->name }}</td>
                                                                    <td class="py-2 px-2">{{ $subscription->number_of_wash }}</td>
                                                                    <td class="py-2 px-2">{{ $subscription->start_date }}</td>
                                                                    <td class="py-2 px-2">{{ $subscription->end_date }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="py-4 px-4">
                                            @if ($customer->cars->isEmpty())
                                                <p>No cars found.</p>
                                            @else
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th class="py-2 px-3">Model</th>
                                                                <th class="py-2 px-3">Color</th>
                                                                <th class="py-2 px-3">Plate Number</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($customer->cars as $car)
                                                                <tr>
                                                                    <td class="py-2 px-2">{{ $car->name }}</td>
                                                                    <td class="py-2 px-2">{{ $car->color }}</td>
                                                                    <td class="py-2 px-2">{{ $car->plate_number }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
{{-- </x-app-layout> --}}
@endsection
