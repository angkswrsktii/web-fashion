<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::with('kasir')->get();
        return response()->json($sales);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'total' => 'required|numeric',
            'kasir_id' => 'required|exists:users,id',
        ]);

        $sales = Sales::create($validated);
        return response()->json($sales, 201);
    }

    public function show($id)
    {
        $sales = Sales::with('kasir')->findOrFail($id);
        return response()->json($sales);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'total' => 'required|numeric',
            'kasir_id' => 'required|exists:users,id',
        ]);

        $sales = Sales::findOrFail($id);
        $sales->update($validated);

        return response()->json($sales);
    }

    public function destroy($id)
    {
        $sales = Sales::findOrFail($id);
        $sales->delete();

        return response()->json(null, 204);
    }
}