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
                <div class="container">
                    <h1 class="h4 font-weight-bold mb-4">Add a New Customer</h1>
                    <form method="post" action="{{ route('customer.store') }}" class="bg-white p-4 rounded shadow-sm">
                        @csrf <!-- Include CSRF token for security -->
                        @method('post')

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                        </div>

                        <input type="hidden" name="users_id" value="{{ auth()->id() }}">

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Save Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {{-- </x-app-layout> --}}
    @endsection
