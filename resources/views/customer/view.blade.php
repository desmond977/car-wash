<x-app-layout>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

    <!-- Main Layout -->
    <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        <x-sidebar />

        <!-- Main content -->
        <div class="flex-1 p-6">
            <div class="container mx-auto">
                <h1 class="text-3xl font-bold mb-4">Customer Details</h1>

                <div class="bg-white shadow-md rounded-lg mb-6 p-4">
                    <div class="border-b pb-2 mb-2">
                        <h2 class="text-xl font-semibold">{{ $customer->first_name }} {{ $customer->last_name }}</h2>
                    </div>
                    <div>
                        <p class="text-gray-700"><strong>Email:</strong> {{ $customer->email }}</p>
                        <p class="text-gray-700"><strong>Phone:</strong> {{ $customer->phone_number }}</p>
                    </div>
                </div>

                <h2 class="text-2xl font-semibold mb-4">Subscriptions</h2>
                <a href="{{ route('subscription.create', $customer->id) }}"
                    class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add
                    Subscription</a>


                {{$customer->subscriptions}}
                @if (count($customer->subscriptions)==0)
                    <p class="text-gray-700">No subscriptions found for this customer.</p>
                @else
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <div class="border-b pb-2 mb-2">
                            <h3 class="text-xl font-semibold">Subscription List</h3>
                        </div>
                        <div>
                            <ul class="list-disc pl-5 space-y-4">
                                @foreach ($customer->subscriptions as $subscription)
                                    <li class="bg-gray-50 p-4 rounded-lg shadow">
                                        <p class="text-gray-700"><strong>Subscription Type:</strong>
                                            {{ $subscription->subscriptionType->name }}</p>
                                        <p class="text-gray-700"><strong>Number of Washes:</strong>
                                            {{ $subscription->number_of_wash }}</p>
                                        <p class="text-gray-700"><strong>Start Date:</strong>
                                            {{ $subscription->start_date }}</p>
                                        <p class="text-gray-700"><strong>End Date:</strong>
                                            {{ $subscription->end_date }}</p>
                                        <div class="flex space-x-2 mt-2">
                                            <a href=""
                                                class="px-4 py-2 bg-gray-600 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">Edit</a>
                                            <form action=""
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 bg-red-600 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <h2 class="text-2xl font-semibold mb-4 mt-6">Cars</h2>
                <a href="{{ route('car.customercar', $customer->id) }}"
                    class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add
                    Car</a>

                @if (!isset($customer->cars))
                    <p class="text-gray-700">No cars found for this customer.</p>
                @else
                    @include('car.index', ['cars' => $customer->cars])
                    {{-- <div class="bg-white shadow-md rounded-lg p-4">
                        <div class="border-b pb-2 mb-2">
                            <h3 class="text-xl font-semibold">Car List</h3>
                        </div>
                        <div>
                            <ul class="list-disc pl-5 space-y-4">
                                @foreach ($customer->cars as $car)
                                    <li class="bg-gray-50 p-4 rounded-lg shadow">
                                        <p class="text-gray-700"><strong>Name:</strong> {{ $car->name }}</p>
                                        <p class="text-gray-700"><strong>Color:</strong> {{ $car->color }}</p>
                                        <p class="text-gray-700"><strong>Plate Number:</strong> {{ $car->plate_number }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div> --}}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
