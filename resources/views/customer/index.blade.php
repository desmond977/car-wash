{{-- <x-app-layout> --}}
    @extends('layouts.dashboard')
    @section('content')
        <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

        <div class="d-flex vh-100 bg-light">
            <!-- Include the sidebar component -->
            {{-- <x-sidebar /> --}}

            <!-- Main content -->
            <div class="flex-grow-1 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h4 font-weight-bold">Customers</h1>
                    <a href="{{ route('customer.create') }}" class="btn btn-primary">Add New Customer</a>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <span>{{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (!$customer)
                    <p>No customers available.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="DataTables_Table_0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>User Id</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer as $cust)
                                    <tr>
                                        <td>{{ $cust->id }}</td>
                                        <td>{{ $cust->first_name }}</td>
                                        <td>{{ $cust->last_name }}</td>
                                        <td>{{ $cust->phone_number }}</td>
                                        <td>{{ $cust->email }}</td>
                                        <td>{{ $cust->users_id }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('customer.edit', ['customer' => $cust]) }}" class="btn btn-secondary btn-sm mx-1">Edit</a>
                                            <a href="{{ route('customer.view', ['customer' => $cust]) }}" class="btn btn-primary btn-sm mx-1">View</a>
                                            <form method="POST" action="{{ route('customer.delete', ['customer' => $cust]) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    @endsection
