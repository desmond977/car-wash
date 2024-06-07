{{-- <x-app-layout> --}}
    @extends('layouts.dashboard')
@section('content')
     <!-- Main Layout -->
     <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        {{-- <x-sidebar /> --}}
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Service</h1>
        <form action="{{ route('service.update', $service->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ $service->name }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="wash" class="block text-gray-700 font-medium mb-2">Wash</label>
                <input type="text" id="wash" name="wash" value="{{ $service->wash }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="vacuum_cleaning" class="block text-gray-700 font-medium mb-2">Vacuum Cleaning</label>
                <input type="text" id="vacuum_cleaning" name="vacuum_cleaning" value="{{ $service->vacuum_cleaning }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="flush" class="block text-gray-700 font-medium mb-2">Flush</label>
                <input type="text" id="flush" name="flush" value="{{ $service->flush }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="engine_wash" class="block text-gray-700 font-medium mb-2">Engine Wash</label>
                <input type="text" id="engine_wash" name="engine_wash" value="{{ $service->engine_wash }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="Guest_wash" class="block text-gray-700 font-medium mb-2">Guest Wash</label>
                <input type="text" id="Guest_wash" name="Guest_wash" value="{{ $service->Guest_wash }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="tire_guage" class="block text-gray-700 font-medium mb-2">Tire Gauge</label>
                <input type="text" id="tire_guage" name="tire_guage" value="{{ $service->tire_guage }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="engine_blow" class="block text-gray-700 font-medium mb-2">Engine Blow</label>
                <input type="text" id="engine_blow" name="engine_blow" value="{{ $service->engine_blow }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="dashboard_polish" class="block text-gray-700 font-medium mb-2">Dashboard Polish</label>
                <input type="text" id="dashboard_polish" name="dashboard_polish" value="{{ $service->dashboard_polish }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <input type="submit" value="Update Service" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        </form>
    </div>
{{-- </x-app-layout> --}}
@endsection
