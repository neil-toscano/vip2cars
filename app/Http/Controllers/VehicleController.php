<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Client;
use Illuminate\Http\Request;    
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Vehicle::with('client');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('plate', 'like', "%$search%")
                  ->orWhere('brand', 'like', "%$search%")
                  ->orWhere('model', 'like', "%$search%")
                  ->orWhereHas('client', function ($q) use ($search) {
                      $q->where('first_name', 'like', "%$search%")
                        ->orWhere('last_name', 'like', "%$search%")
                        ->orWhere('document_number', 'like', "%$search%");
                  });
        }

        $vehicles = $query->latest()->paginate(10)->withQueryString();

        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        $validated = $request->validated();

        $client = Client::create([
            'first_name'      => $validated['first_name'],
            'last_name'       => $validated['last_name'],
            'document_number' => $validated['document_number'],
            'email'           => $validated['email'],
            'phone'           => $validated['phone'],
        ]);

        Vehicle::create([
            'client_id'        => $client->id,
            'plate'            => $validated['plate'],
            'brand'            => $validated['brand'],
            'model'            => $validated['model'],
            'manufacture_year' => $validated['manufacture_year'],
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehículo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        $vehicle->load('client');
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        $vehicle->load('client');
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $validated = $request->validated();

        $vehicle->client->update([
            'first_name'      => $validated['first_name'],
            'last_name'       => $validated['last_name'],
            'document_number' => $validated['document_number'],
            'email'           => $validated['email'],
            'phone'           => $validated['phone'],
        ]);

        $vehicle->update([
            'plate'            => $validated['plate'],
            'brand'            => $validated['brand'],
            'model'            => $validated['model'],
            'manufacture_year' => $validated['manufacture_year'],
        ]);

        return redirect()->route('vehicles.index')
                         ->with('success', 'Vehículo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->client->delete();
        $vehicle->delete();

        return redirect()->route('vehicles.index')
                         ->with('success', 'Vehículo eliminado correctamente.');
    }
}
