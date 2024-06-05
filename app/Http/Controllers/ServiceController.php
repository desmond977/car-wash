<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('service.index', compact('services'));
    }

    public function create()
    {
        return view('service.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'wash' => 'required',
            'vacuum_cleaning' => 'required',
            'flush' => 'required',
            'engine_wash' => 'required',
            'Guest_wash' => 'required',
            'tire_guage' => 'required',
            'engine_blow' => 'required',
            'dashboard_polish' => 'required',

        ]);

        Service::create($data);

        return redirect()->route('service.create')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => 'required',
            'wash' => 'required',
            'vacuum_cleaning' => 'required',
            'flush' => 'required',
            'engine_wash' => 'required',
            'Guest_wash' => 'required',
            'tire_guage' => 'required',
            'engine_blow' => 'required',
            'dashboard_polish' => 'required',

        ]);

        $service->update($data);

        return redirect()->route('service.index')->with('success', 'Service updated successfully.');
    }

    public function delete(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service deleted successfully.');
    }
}
