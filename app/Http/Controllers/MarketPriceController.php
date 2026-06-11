<?php

namespace App\Http\Controllers;

use App\Models\MarketPrice;
use Illuminate\Http\Request;

class MarketPriceController extends Controller
{
    public function index()
    {
        $prices = MarketPrice::latest()->get();
        return view('pricemarket', compact('prices'));
    }

    public function adminIndex()
    {
        $prices = MarketPrice::latest()->paginate(10);
        return view('admin.market-prices.index', compact('prices'));
    }

    public function create()
    {
        return view('admin.market-prices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rice_variety' => 'required|string|max:255',
            'rice_type' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'market' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'change_percent' => 'nullable|numeric',
        ]);

        MarketPrice::create($request->all());

        return redirect()->route('admin.market-prices.index')
            ->with('success', 'Price added successfully!');
    }

    public function edit(MarketPrice $marketPrice)
    {
        return view('admin.market-prices.edit', compact('marketPrice'));
    }

    public function update(Request $request, MarketPrice $marketPrice)
    {
        $request->validate([
            'rice_variety' => 'required|string|max:255',
            'rice_type' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'market' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'change_percent' => 'nullable|numeric',
        ]);

        $marketPrice->update($request->all());

        return redirect()->route('admin.market-prices.index')
            ->with('success', 'Price updated successfully!');
    }

    public function destroy(MarketPrice $marketPrice)
    {
        $marketPrice->delete();

        return redirect()->route('admin.market-prices.index')
            ->with('success', 'Price deleted successfully!');
    }
}