<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Country::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $country =  $request->validate([
            'name' => 'required|string|min:3|max:100',
            'capital' => 'required|string|min:3|max:100',
            'population' => 'required|integer|min:1000',
            'region' => 'required|string|min:3|max:100',
            'flag_url' => 'required|url|max:255',
        ]);
        $cnt = Country::create($country);
        return  $cnt;
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return $country;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $filed =  $request->validate([
            'name' => 'required|string|min:3|max:100',
            'capital' => 'required|string|min:3|max:100',
            'population' => 'required|integer|min:1000',
            'region' => 'required|string|min:3|max:100',
            'flag_url' => 'required|url|max:255',
        ]);
        $country->update($filed);
        return  $country;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
       $country->delete();
       return ['message' => 'The Country was deleted'];
    }
}
