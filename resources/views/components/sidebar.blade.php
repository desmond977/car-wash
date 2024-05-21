<!-- resources/views/components/sidebar.blade.php -->

<div class="bg-gray-800 text-white w-64 flex flex-col justify-between">
    <!-- Sidebar content -->
    <div class="p-4">
        <h1 class="text-xl font-bold">Dashboard</h1>
        <ul class="mt-4">
            <!-- Sidebar links -->
            <li class="mb-2">
            <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-sm hover:bg-gray-700 hover:text-white">Dashboard</a>
            </li>
            <li class="mb-2">
            <select onchange="window.location.href=this.value" class="block appearance-none w-full bg-gray-700 border border-gray-600 text-white py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-gray-800 focus:border-gray-700">
                <option value="#" selected disabled>Customers</option>
                <option value="{{ route('customer.index') }}">View All Customers</option>
                <option value="{{ route('customer.create') }}">Add a new Customer</option>

            </select>
            </li>
            <li class="mb-2">
                <select onchange="window.location.href=this.value" class="block appearance-none w-full bg-gray-700 border border-gray-600 text-white py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-gray-800 focus:border-gray-700">
                    <option value="#" selected disabled>Cars</option>
                    <option value="{{ route('car.index') }}">View All Cars</option>
                    <option value="{{ route('car.create') }}">Add a new Car</option>

                </select>
            </li>

            <li class="mb-2">
                <select onchange="window.location.href=this.value" class="block appearance-none w-full bg-gray-700 border border-gray-600 text-white py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-gray-800 focus:border-gray-700">
                    <option value="#" selected disabled>Subscription Plans</option>
                    <option value="{{ route('subscription_type.index') }}">View Subscription Plans</option>
                    <option value="{{ route('subscription_type.create') }}">Add a new Subscription Plan</option>

                </select>
            </li>
            <!-- Add more sidebar links here -->
        </ul>
    </div>
    <!-- Sidebar footer -->
    <div class="p-4 bg-gray-900">
        <p class="text-sm">Your Company Name</p>
        <p class="text-xs mt-2">&copy; 2024 All rights reserved.</p>
    </div>
</div>
