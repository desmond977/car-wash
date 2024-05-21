<x-app-layout>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

    <!-- Main Layout -->
    <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        <x-sidebar />

        <!-- Main content -->
        <div class="flex-1 p-6">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold mb-4">Create Subscription Type</h1>
                <form action="{{ route('subscription_type.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
                        <input type="number" id="price" name="price" step="0.01" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="number_cars_allowed" class="block text-gray-700 font-medium mb-2">Number of Cars Allowed</label>
                        <input type="number" id="number_cars_allowed" name="number_cars_allowed" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="duration" class="block text-gray-700 font-medium mb-2">Duration (days)</label>
                        <input type="number" id="duration" name="duration" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                        <textarea id="description" name="description" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"></textarea>
                    </div>
                    <input type="submit" value="Save Plan" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
