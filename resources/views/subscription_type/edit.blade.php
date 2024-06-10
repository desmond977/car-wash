@extends('layouts.dashboard')
@section('content')
<div class="container my-4">
    <h1 class="mb-4">Edit Subscription Type</h1>
    <form action="{{ route('subscription_type.update', $subscriptionType->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', $subscriptionType->name) }}">
        </div>

        <!-- Price Field -->
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" id="price" name="price" step="0.01" class="form-control" required value="{{ old('price', $subscriptionType->price) }}">
        </div>

        <!-- Number of Cars Allowed Field -->
        <div class="mb-3">
            <label for="number_cars_allowed" class="form-label">Number of Cars Allowed</label>
            <input type="number" id="number_cars_allowed" name="number_cars_allowed" class="form-control" required value="{{ old('number_cars_allowed', $subscriptionType->number_cars_allowed) }}">
        </div>

        <!-- Duration Field -->
        <div class="mb-3">
            <label for="duration" class="form-label">Duration (days)</label>
            <input type="number" id="duration" name="duration" class="form-control" required value="{{ old('duration', $subscriptionType->duration) }}">
        </div>

        <!-- Description Field -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" rows="3" class="form-control">{{ old('description', $subscriptionType->description) }}</textarea>
        </div>

        <!-- Services Field -->
        <div class="mb-3">
            <label for="services" class="form-label">Services</label>
            @foreach($services as $service)
                <div class="form-check">
                    <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input" id="service{{ $service->id }}"
                        {{ in_array($service->id, old('services', $subscriptionType->services->pluck('id')->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="service{{ $service->id }}">{{ $service->name }}</label>
                </div>
            @endforeach
        </div>

        <!-- Submit Button -->
        <div>
            <input type="submit" value="Update Plan" class="btn btn-primary w-100 text-black">
        </div>
    </form>
</div>
@endsection
