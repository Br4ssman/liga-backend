<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Club::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $club = Club::create($request->all());
        return response()->json($club, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Club::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $club = Club::findOrFail($id);
        $club->update($request->all());
        return response()->json($club);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Club::destroy($id);
        return response()->json(['mensaje' => 'Club eliminado']);
    }
}
