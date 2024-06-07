{{-- <x-app-layout> --}}
    @extends('layouts.dashboard')
@section('content')
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

    <!-- Example usage in a view -->
    <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        {{-- <x-sidebar /> --}}

        <!-- Main content -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Add a new Car</h1>
            <form method="post" action="{{ route('car.store') }}" class="bg-white p-6 rounded-lg shadow-md">
                @csrf <!-- Include CSRF token for security -->
                @method('post')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                    <input type="text" id="color" name="color" placeholder="Color" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="plate_number" class="block text-sm font-medium text-gray-700">Plate Number</label>
                    <input type="text" id="plate_number" name="plate_number" placeholder="Plate Number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <input type="hidden" name="customers_id" value="{{ $customer->id }}">
                </div>
                <div class="mb-4">
                    <input type="hidden" name="users_id" value="{{ auth()->id() }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <input type="submit" value="Save Car" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                </div>
            </form>
        </div>
    </div>
    @endsection
{{-- </x-app-layout> --}}
