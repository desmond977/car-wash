<x-app-layout>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

    <!-- Main Layout -->
    <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        <x-sidebar />

        <!-- Main content -->
        <div class="flex-1 p-6">
            <div class="container mx-auto">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h1 class="text-3xl font-bold mb-4">Create Subscription for {{ $customer->first_name }}</h1>
                <form action="{{ route('subscription.store', ['customer' => $customer]) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                    @csrf
                    <div class="mb-4">
                        <label for="subscription_types_id" class="block text-gray-700 font-medium mb-2">Subscription Type</label>
                        <select name="subscription_types_id" id="subscription_types_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" onchange="updateNumberOfWashes()">
                            @foreach ($subscriptionTypes as $type)
                                <option value="{{ $type->id }}" data-washes="{{ $type->number_of_washes }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <input type="hidden" name="customers_id" value="{{ $customer->id }}">
                    </div>
                    <div class="mb-4">
                        <label for="number_of_wash" class="block text-gray-700 font-medium mb-2">Number of Washes</label>
                        <input type="number" name="number_of_wash" id="number_of_wash" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="mb-4">
                        <label for="start_date" class="block text-gray-700 font-medium mb-2">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="mb-4">
                        <label for="end_date" class="block text-gray-700 font-medium mb-2">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <button type="submit" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Subscription</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateNumberOfWashes() {
            const subscriptionTypeSelect = document.getElementById('subscription_types_id');
            const numberOfWashesInput = document.getElementById('number_of_wash');
            const selectedOption = subscriptionTypeSelect.options[subscriptionTypeSelect.selectedIndex];
            const numberOfWashes = selectedOption.getAttribute('data-washes');
            numberOfWashesInput.value = numberOfWashes;
        }
    </script>
</x-app-layout>
