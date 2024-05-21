<x-app-layout>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

    <!-- Main Layout -->
    <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        <x-sidebar />

        <!-- Main content -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Edit Customer</h1>
            <form method="post" action="{{ route('customer.update', ['customer' => $customer]) }}" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto space-y-4">
                @csrf <!-- Include CSRF token for security -->
                @method('put')
                <div>
                    <label class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="first_name" placeholder="First Name" value="{{ $customer->first_name }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="last_name" placeholder="Last Name" value="{{ $customer->last_name }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone_number" placeholder="Phone Number"
                        value="{{ $customer->phone_number }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" placeholder="Email"
                        value="{{ $customer->email }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div>
                    <input type="hidden" name="users_id" placeholder="Users ID" value="{{ auth()->id() }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div>
                    <input type="submit" value="Update Customer"
                        class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
