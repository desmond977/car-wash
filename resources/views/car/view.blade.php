{{-- <x-app-layout> --}}
    @extends('layouts.dashboard')
@section('content')
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">


    <!-- Example usage in a view -->
    <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        {{-- <x-sidebar /> --}}

        <!-- Main content -->
        <div class="flex-1">
            <div class="container mx-auto py-6">
                <h2 class="text-2xl font-semibold text-gray-800">Cars</h2>
                @if (count($cars) > 0)
                    <div class="mt-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Model</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($cars as $car)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $car->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $car->brand }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $car->model }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('car.destroy', $car->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="mt-4">No cars found.</p>
                @endif
            </div>
        </div>
    </div>


{{-- </x-app-layout> --}}
@endsection
