{{-- <x-app-layout> --}}
    @extends('layouts.dashboard')
    @section('content')

        <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

        <!-- Main Layout -->
        <div class="d-flex vh-100 bg-light">
            <!-- Include the sidebar component -->
            {{-- <x-sidebar /> --}}

            <!-- Main content -->
            <div class="flex-grow-1 p-4">
                <div class="container">
                    <h1 class="h3 font-weight-bold mb-4">Customer Details</h1>

                    <!-- Customer Info -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h2 class="h5 mb-0 text-white">{{ $customer->first_name }} {{ $customer->last_name }}</h2>
                        </div>
                        <div class="card-body">
                            <p><strong>Email:</strong> {{ $customer->email }}</p>
                            <p><strong>Phone:</strong> {{ $customer->phone_number }}</p>
                        </div>
                    </div>

                    <!-- Subscriptions -->
                    <h2 class="h4 mb-3">Subscriptions</h2>
                    <a href="{{ route('subscription.create', $customer->id) }}"
                        class="btn btn-primary mb-3">Add Subscription</a>

                    @if (count($customer->subscriptions) == 0)
                        <p>No subscriptions found for this customer.</p>
                    @else
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="h5 mb-0">Subscription List</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    @foreach ($customer->subscriptions as $subscription)
                                        <li class="border rounded mb-3 p-3 bg-light">
                                            <p><strong>Subscription Type:</strong> {{ $subscription->subscriptionType->name }}</p>
                                            <p><strong>Number of Washes:</strong> {{ $subscription->number_of_wash }}</p>
                                            <p><strong>Start Date:</strong> {{ $subscription->start_date }}</p>
                                            <p><strong>End Date:</strong> {{ $subscription->end_date }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- Car List -->
                    <h2 class="h4 mb-3 mt-4">Cars</h2>
                    <a href="{{ route('car.customercar', $customer->id) }}"
                        class="btn btn-primary mb-3">Add Car</a>

                    @if (!isset($customer->cars) || $customer->cars->isEmpty())
                        <p>No cars found for this customer.</p>
                    @else
                        <div class="row">
                            @foreach ($customer->cars as $car)
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $car->name }}</h5>
                                            <p class="card-text"><strong>Color:</strong> {{ $car->color }}</p>
                                            <p class="card-text"><strong>Plate Number:</strong> {{ $car->plate_number }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endsection
    {{-- </x-app-layout> --}}
