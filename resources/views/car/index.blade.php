{{-- <x-app-layout>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

    <div class="flex h-screen bg-gray-100">
        <!-- Include the sidebar component -->
        <x-sidebar /> --}}

        <!-- Main content -->
        {{-- <div class="flex-1 p-6"> <!-- Add padding to the main content --> --}}
            {{-- <div class="mb-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Cars</h1>
                <a href="{{ route('car.create') }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New Car</a>
            </div>

            @if (session()->has('success'))
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif --}}

            {{-- @if($cars->isEmpty())
                <p>No cars available.</p>
            @else --}}
            {{-- <div class="card"> --}}
                {{-- <div class="card-header"></div> --}}
                <div class="bg-white shadow-md rounded-lg mb-6 p-4">
                    <table class="w-full border-collapse border border-gray-400">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">ID</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Name</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Color</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Plate Number</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Customer Id</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">User Id</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Edit</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <tr>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->id }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->name }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->color }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->plate_number }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->customers_id }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->users_id }}</td>
                                    <td class="px-4 py-2 border border-gray-400 text-center">
                                        <a href="{{ route('car.edit', ['car' => $car]) }}" class="bg-yellow-500 text-white px-4 py-2 rounded cursor-pointer hover:bg-yellow-600">Edit</a>
                                    </td>
                                    <td class="px-4 py-2 border border-gray-400 text-center">
                                        <form method="POST" action="{{ route('car.delete', ['car' => $car]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="bg-red-500 text-white px-4 py-2 rounded cursor-pointer hover:bg-red-600">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            {{-- </div> --}}
            {{-- @endif
        </div>
    </div>
</x-app-layout> --}}
