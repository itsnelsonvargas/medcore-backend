<?php

namespace App\Http\Controllers;

use App\Models\Client; // 1. IMPORT MODEL
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $startTime = microtime(true);
        $clients = Client::all();

        return $this->apiResponseFormat(
            'success',
            $clients,
            'All clients fetched successfully',
            $startTime,
            200
        );
    }

    public function store(Request $request)
    {
        $startTime = microtime(true);

        // 4. VALIDATE STORE REQUEST
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $client = Client::create($validatedData);

        return $this->apiResponseFormat(
            'success',
            $client,
            'Client created successfully with id: ' . $client->id,
            $startTime,
            201 // Standard status for created
        );
    }

    public function show($id)
    {
        $startTime = microtime(true);
        // 2. findOrFail throws exception, no need for if(!client)
        $client = Client::findOrFail($id);

        return $this->apiResponseFormat(
            'success',
            $client,
            'Client fetched successfully with id: ' . $id,
            $startTime,
            200
        );
    }

    // 3. ADDED REQUEST ARGUMENT
    public function update(Request $request, $id)
    {
        $startTime = microtime(true);
        $client = Client::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email,' . $client->id,
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $client->update($validatedData);

        return $this->apiResponseFormat(
            'success',
            $client,
            'Client updated successfully with id: ' . $id,
            $startTime,
            200
        );
    }

    public function destroy($id)
    {
        $startTime = microtime(true);
        $client = Client::findOrFail($id);

        $client->delete();

        return $this->apiResponseFormat(
            'success',
            null, // Returning null for deletion is standard
            'Client deleted successfully',
            $startTime,
            200
        );
    }
}