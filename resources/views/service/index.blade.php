{{-- <x-app-layout>
    <div class="container mx-auto py-8">
        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">Services</h1>
            <a href="{{ route('service.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Service</a>
        </div>

        @if(session('success'))
            <div class="bg-green-500 text-white py-2 px-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif --}}

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200 text-left">ID</th>
                        <th class="py-2 px-4 bg-gray-200 text-left">Name</th>
                        <th class="py-2 px-4 bg-gray-200 text-left">Wash</th>
                        <th class="py-2 px-4 bg-gray-200 text-left">Vacuum Cleaning</th>
                        <th class="py-2 px-4 bg-gray-200 text-left">Flush</th>
                        <th class="py-2 px-4 bg-gray-200 text-left">Engine Wash</th>
                        <th class="py-2 px-4 bg-gray-200 text-left">Guest Wash</th>
                        <th class="py-2 px-4 bg-gray-200 text-left">Tire Gauge</th>
                        <th class="py-2 px-4 bg-gray-200 text-left">Engine Blow</th>
                        <th class="py-2 px-4 bg-gray-200 text-left">Dashboard Polish</th>
                        <th class="py-2 px-4 bg-gray-200 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!is_null($services) && $services->isNotEmpty())
                    @foreach ($services as $service)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $service->id }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $service->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $service->wash }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $service->vacuum_cleaning }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $service->flush }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $service->engine_wash }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $service->Guest_wash }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $service->tire_guage }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $service->engine_blow }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $service->dashboard_polish }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <a href="{{ route('service.edit', $service->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                                <form action="{{ route('service.delete', $service->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded" onclick="return confirm('Are you sure you want to delete this service?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @else
                   <p>No services included.</p>
                @endif
            </table>
        </div>
    {{-- </div>
</x-app-layout> --}}
