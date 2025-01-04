<?php

namespace App\Http\Controllers;
use App\Models\Resturant;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
    public function index()
    {
        return Resturant::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return Resturant::create($request->all());
    }

    public function show($id)
    {
        return Resturant::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $resturant = Resturant::findOrFail($id);
        $resturant->update($request->all());
        return $resturant;
    }

    public function destroy($id)
    {
        Resturant::destroy($id);
        return response()->noContent();
    }
}
