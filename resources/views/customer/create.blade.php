<x-app-layout>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

    <!-- Main Layout -->
    <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        <x-sidebar />

        <!-- Main content -->
        <div class="flex-1 p-6">
            <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Add a new Customer</h1>
            <form method="post" action="{{route('customer.store')}}" class="bg-white p-6 rounded-lg shadow-md">
                @csrf <!-- Include CSRF token for security -->
                @method('post')
                <div  class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="first_name" placeholder="First Name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div  class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="last_name" placeholder="Last Name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div  class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone_number" placeholder="Phone Number" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div  class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" placeholder="Email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div  class="mb-4">
                    <input type="hidden" name="users_id" value="{{ auth()->id() }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div  class="mb-4">
                    <input type="submit" value="Save Customer" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                </div>
            </form>
        </div>
     </div>
</div>
</x-app-layout>
