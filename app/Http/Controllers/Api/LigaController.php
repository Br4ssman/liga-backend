<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Liga;
use Illuminate\Http\Request;
use Termwind\Components\Li;

class LigaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Liga::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $liga = Liga::create($request->all());
        return response()->json($liga, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Liga::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $liga = Liga::findOrFail($id);
        $liga->update($request->all());
        return response()->json($liga);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Liga::destroy($id);
        return response()->json(['mensaje' => 'Liga eliminada']);
    }
}
