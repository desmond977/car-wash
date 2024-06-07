<!-- resources/views/dashboard.blade.php -->
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
                    <div class="bg-white shadow rounded-lg border custom-padding custom-border col-12 col-md-6 col-lg-3 mb-3 ml-1 mr-1">
                        <h2 class="h4 font-weight-normal">Total Customers</h2>
                        <p class="text-2xl">{{ $totalCustomers }}</p>
                    </div>
                    <div class="bg-white shadow rounded-lg border custom-padding custom-border col-12 col-md-6 col-lg-3 mb-3 ml-1 mr-1">
                        <h2 class="h4 font-weight-normal">Total Subscriptions</h2>
                        <p class="text-2xl">{{ $totalSubscriptions }}</p>
                    </div>
                    <div class="bg-white shadow rounded-lg border custom-padding custom-border col-12 col-md-6 col-lg-3 mb-3 ml-1 mr-1">
                        <h2 class="h4 font-weight-normal">Total Revenue</h2>
                        <p class="text-2xl">${{ $totalRevenue }}</p>
                    </div>
                    <div class="bg-white shadow rounded-lg border custom-padding custom-border col-12 col-md-6 col-lg-3 mb-3 ml-1 mr-1">
                        <h2 class="h4 font-weight-normal">Other Statistic</h2>
                        <p class="text-2xl">{{ $otherStatistic }}</p>
                    </div>
                </div>

                <!-- Customers List -->
                <h2 class="text-2xl font-bold mb-4">Customers</h2>
                <div class="bg-white shadow rounded-lg p-6 border border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 border-b border-gray-300 bg-gray-100">Customer Details</th>
                                    <th class="py-3 px-4 border-b border-gray-300 bg-gray-100">Subscriptions</th>
                                    <th class="py-3 px-4 border-b border-gray-300 bg-gray-100">Cars</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr class="border-b border-gray-300">
                                        <td class="py-4 px-4 border-r border-gray-300">
                                            <p class="font-bold">{{ $customer->first_name }} {{ $customer->last_name }}</p>
                                            <p><strong>Email:</strong> {{ $customer->email }}</p>
                                            <p><strong>Phone:</strong> {{ $customer->phone_number }}</p>
                                        </td>
                                        <td class="py-4 px-4 border-r border-gray-300">
                                            @if ($customer->subscriptions->isEmpty())
                                                <p>No subscriptions found.</p>
                                            @else
                                                <table class="min-w-full bg-white border border-gray-300">
                                                    <thead>
                                                        <tr>
                                                            <th class="py-2 px-3 border-b border-gray-300 bg-gray-100">Type</th>
                                                            <th class="py-2 px-3 border-b border-gray-300 bg-gray-100">Washes</th>
                                                            <th class="py-2 px-3 border-b border-gray-300 bg-gray-100">Start Date</th>
                                                            <th class="py-2 px-3 border-b border-gray-300 bg-gray-100">End Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($customer->subscriptions as $subscription)
                                                            <tr class="border-b border-gray-300">
                                                                <td class="py-2 px-2 border-r border-gray-300">{{ $subscription->subscriptionType->name }}</td>
                                                                <td class="py-2 px-2 border-r border-gray-300">{{ $subscription->number_of_wash }}</td>
                                                                <td class="py-2 px-2 border-r border-gray-300">{{ $subscription->start_date }}</td>
                                                                <td class="py-2 px-2">{{ $subscription->end_date }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </td>
                                        <td class="py-4 px-4">
                                            @if ($customer->cars->isEmpty())
                                                <p>No cars found.</p>
                                            @else
                                                <table class="min-w-full bg-white border border-gray-300">
                                                    <thead>
                                                        <tr>
                                                            <th class="py-2 px-3 border-b border-gray-300 bg-gray-100">Model</th>
                                                            <th class="py-2 px-3 border-b border-gray-300 bg-gray-100">Color</th>
                                                            <th class="py-2 px-3 border-b border-gray-300 bg-gray-100">Plate Number</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($customer->cars as $car)
                                                            <tr class="border-b border-gray-300">
                                                                <td class="py-2 px-2 border-r border-gray-300">{{ $car->name }}</td>
                                                                <td class="py-2 px-2 border-r border-gray-300">{{ $car->color }}</td>
                                                                <td class="py-2 px-2">{{ $car->plate_number }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
