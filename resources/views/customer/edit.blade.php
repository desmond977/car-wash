{{-- <x-app-layout> --}}
    @extends('layouts.dashboard')
    @section('content')

        <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

        <!-- Main Layout -->
        <div class="d-flex vh-100 bg-light">
            <!-- Include the sidebar component -->
            {{-- <x-sidebar /> --}}

            <!-- Main content -->
            <div class="flex-grow-1 p-4">
                <h1 class="h4 font-weight-bold mb-4">Edit Customer</h1>
                <form method="post" action="{{ route('customer.update', ['customer' => $customer]) }}" class="bg-white p-4 rounded shadow-sm max-w-md mx-auto">
                    @csrf <!-- Include CSRF token for security -->
                    @method('put')

                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" value="{{ $customer->first_name }}"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" value="{{ $customer->last_name }}"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{ $customer->phone_number }}"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" value="{{ $customer->email }}"
                            class="form-control" required>
                    </div>

                    <input type="hidden" name="users_id" value="{{ auth()->id() }}">

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Update Customer</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    {{-- </x-app-layout> --}}
