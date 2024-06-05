<x-app-layout>
     <!-- Main Layout -->
     <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        <x-sidebar />
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Create Service</h1>
        <form action="{{ route('service.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="wash" class="block text-gray-700 font-medium mb-2">wash</label>
                <input type="number" id="wash" name="wash" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="vacuum_cleaning" class="block text-gray-700 font-medium mb-2">vacuum_cleaning</label>
                <input type="number" id="vacuum_cleaning" name="vacuum_cleaning" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="flush" class="block text-gray-700 font-medium mb-2">flush</label>
                <input type="number" id="flush" name="flush" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="engine_wash" class="block text-gray-700 font-medium mb-2">engine_wash</label>
                <input type="number" id="engine_wash" name="engine_wash" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="Guest_wash" class="block text-gray-700 font-medium mb-2">Guest_wash</label>
                <input type="number" id="Guest_wash" name="Guest_wash" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="tire_guage" class="block text-gray-700 font-medium mb-2">tire_guage</label>
                <input type="number" id="tire_guage" name="tire_guage" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="engine_blow" class="block text-gray-700 font-medium mb-2">engine_blow</label>
                <input type="number" id="engine_blow" name="engine_blow" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="dashboard_polish" class="block text-gray-700 font-medium mb-2">dashboard_polish</label>
                <input type="number" id="dashboard_polish" name="dashboard_polish" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <input type="submit" value="Save Service" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        </form>
    </div>
</x-app-layout>
