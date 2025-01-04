<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
class OfferController extends Controller
{
     // Get all offers
    public function index()
    {
        $offers = Offer::all();
        return response()->json($offers);
    }

    // Create a new offer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $offer = Offer::create($validated);
        return response()->json($offer, 200);
    }

    // Get a single offer
    public function show($id)
    {
        $offer = Offer::findOrFail($id);
        return response()->json($offer);
    }

    // Update an offer
    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $offer->update($validated);
        return response()->json($offer);
    }

    // Delete an offer
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return response()->json(
            ['message'=>'the ofer deleted successfully'], 200);
    }
}
