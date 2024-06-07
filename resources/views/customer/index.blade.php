{{-- <x-app-layout> --}}
@extends('layouts.dashboard')
@section('content')
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

    <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        {{-- <x-sidebar /> --}}

        <!-- Main content -->
        <div class="flex-1 p-6">
            <div class="mb-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Customers</h1>
                <a href="{{ route('customer.create') }}"
                    class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New Customer</a>
            </div>

            @if (session()->has('success'))
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (!$customer)
                <p>No customers available.</p>
            @else
            <table class="datatables-order table dataTable no-footer dtr-column" id="DataTables_Table_0"
            aria-describedby="DataTables_Table_0_info">
            <thead class="table-light">
                <tr>
                            <th class="px-4 py-2 bg-gray-200 border border-gray-400">ID</th>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 72.8854px;" aria-sort="ascending"
                            aria-label="date: activate to sort column descending">First Name</th>
                            <th th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 72.8854px;" aria-sort="ascending"
                            aria-label="date: activate to sort column descending">Last Name</th>
                            <th th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 72.8854px;" aria-sort="ascending"
                            aria-label="date: activate to sort column descending">Phone Number</th>
                            <th class="px-4 py-2 bg-gray-200 border border-gray-400">Email</th>
                            <th class="px-4 py-2 bg-gray-200 border border-gray-400">User Id</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 106.729px;"
                            aria-label="Actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $cust)
                            <tr>
                                {{-- {{$cust->subscriptions}} --}}
                                <td class="px-4 py-2 border border-gray-400">{{ $cust->id }}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $cust->first_name }}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $cust->last_name }}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $cust->phone_number }}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $cust->email }}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $cust->users_id }}</td>
                                <td class="px-4 py-2 border border-gray-400 flex space-x-2">
                                    <a href="{{ route('customer.edit', ['customer' => $cust]) }}"
                                        class="btn btn-secondary text-white px-3 py-1 mt-1 rounded custom-hover">Edit</a>
                                    <a href="{{ route('customer.view', ['customer' => $cust]) }}"
                                        class="btn btn-primary text-white px-3 py-1 mt-1 rounded custom-hover">View</a>
                                    <form method="POST" action="{{ route('customer.delete', ['customer' => $cust]) }}"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                        class="btn btn-warning text-white px-3 py-1 mt-1 rounded custom-hover">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
