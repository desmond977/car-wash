<x-app-layout>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

    <!-- Main Layout -->
    <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        <x-sidebar />

        <!-- Main content -->
        <div class="flex-1 p-6">
            <!-- Success Message -->
            @if (session()->has('success'))
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Header and Add Button -->
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Subscription Types</h1>
                <a href="{{ route('subscription_type.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Subscription Type</a>
            </div>

            <!-- Table -->
            @if($subscriptions->isEmpty())
                <p class="text-gray-500">No subscription types available.</p>
            @else
                <table class="w-full border-collapse border border-gray-400 bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-200 border border-gray-400">Name</th>
                            <th class="px-4 py-2 bg-gray-200 border border-gray-400">Description</th>
                            <th class="px-4 py-2 bg-gray-200 border border-gray-400">Price</th>
                            <th class="px-4 py-2 bg-gray-200 border border-gray-400">Number of Cars Allowed</th>
                            <th class="px-4 py-2 bg-gray-200 border border-gray-400">Duration (days)</th>
                            <th class="px-4 py-2 bg-gray-200 border border-gray-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriptions as $subscriptionType)
                            <tr>
                                <td class="px-4 py-2 border border-gray-400">{{ $subscriptionType->name }}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $subscriptionType->description }}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $subscriptionType->formattedPrice() }}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $subscriptionType->number_cars_allowed }}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $subscriptionType->duration }}</td>
                                <td class="px-4 py-2 border border-gray-400">
                                    <div class="flex space-x-2">

                                        <a href="{{ route('subscription_type.edit', $subscriptionType->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Edit</a>
                                        <form action="{{ route('subscription_type.delete', $subscriptionType->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
