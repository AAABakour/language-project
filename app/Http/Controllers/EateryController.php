<?php

namespace App\Http\Controllers;
use App\Models\Eatery;
use Illuminate\Http\Request;

class EateryController extends Controller
{
    public function index()
    {
        return Eatery::all(); // Returns all eateries
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return Eatery::create($request->all());
    }

    public function show($id)
    {
        return Eatery::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $eatery = Eatery::findOrFail($id);
        $eatery->update($request->all());
        return response()->json(
            ['message'=>'the restaurant updated successfully'], 200);
    }

    public function destroy($id)
    {
        Eatery::destroy($id);
        return response()->json(
            ['message'=>'the restaurant deleted successfully'], 200);
    }

    public function allEateries()
    {
        return Eatery::all(); // Method to return all eateries
    }

    // Method to get most requested eateries
    public function mostRequested()
    {
        return Eatery::orderBy('requests_count', 'desc')->take(10)->get(); // Get top 10 requested eateries
    }

    // Method to increment request count
    public function requestEatery($id)
    {
        $eater = Eatery::findOrFail($id);
        $eater->incrementRequestCount();
        return response()->json(['message' => 'Request count incremented.']);
    }
}
