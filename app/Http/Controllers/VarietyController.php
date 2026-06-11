<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variety;
use Illuminate\Support\Facades\Storage;

class VarietyController extends Controller
{
    // public function index()
    // {
    //     $paginatedVarieties = Variety::latest()->paginate(10);
        
    //     $totalCount = Variety::count(); 
    //     $highDemandCount = Variety::where('demand', 'Very High')->orWhere('demand', 'High')->count();

    //     return view('variety', [
    //         'varieties' => $paginatedVarieties,
    //         'totalCount' => $totalCount,
    //         'highDemandCount' => $highDemandCount
    //     ]);
    // }


public function index(Request $request)
{
    $query = Variety::query();

    // Type filter (pills)
    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    // Search (name, Khmer name, location)
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('khmer_name', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%");
        });
    }

    // Sort
    if ($request->sort === 'az') {
        $query->orderBy('name', 'asc');
    } elseif ($request->sort === 'za') {
        $query->orderBy('name', 'desc');
    } else {
        $query->latest();
    }

    $varieties = $query->paginate(9)->withQueryString();
    $allNames = Variety::orderBy('name')->pluck('name'); 

    $totalCount = Variety::count();
    $highDemandCount = Variety::whereIn('demand', ['Very High', 'High'])->count();

    return view('variety', [
        'varieties' => $varieties,
        'totalCount' => $totalCount,
        'highDemandCount' => $highDemandCount
    ]);
}

    public function manageScreen()
    {
        $myVarieties = Variety::where('user_id', auth()->id())->latest()->get();
        return view('manage-varieties', ['myVarieties' => $myVarieties]);
    }

    public function createVariety(Request $request)
    {
        $incomingField = $request->validate([
            'name' => 'required|string|max:255',
            'khmer_name' => 'required|string|max:255',
            'type' => 'required',
            'location' => 'required',
            'description' => 'nullable',
            'yield' => 'required',
            'cycle' => 'required',
            'season' => 'required',
            'demand' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $incomingField['name'] = strip_tags($incomingField['name']);
        $incomingField['khmer_name'] = strip_tags($incomingField['khmer_name']);
        $incomingField['location'] = strip_tags($incomingField['location']);
        $incomingField['description'] = strip_tags($incomingField['description']);
        $incomingField['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $incomingField['image'] = $request->file('image')->store('ricetypes', 'public');
        }

        Variety::create($incomingField);
        return redirect('/variety')->with('success', 'Variety created successfully!');
    }

    public function showEditScreen(Variety $variety) {
        if (auth()->id() !== $variety->user_id) {
            abort(403);
        }
        return view('edit-variety', ['variety' => $variety]);
    }

    public function updateVariety(Variety $variety, Request $request) {
        if (auth()->id() !== $variety->user_id) { abort (403); }

        $incomingField = $request->validate([
            'name' => 'required',
            'khmer_name' => 'required',
            'type' => 'required',
            'location' => 'required',
            'description' => 'nullable',
            'yield' => 'required',
            'cycle' => 'required',
            'season' => 'required',
            'demand' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $incomingField['name'] = strip_tags($incomingField['name']);
        $incomingField['khmer_name'] = strip_tags($incomingField['khmer_name']);
        $incomingField['location'] = strip_tags($incomingField['location']);
        $incomingField['description'] = strip_tags($incomingField['description']);

        if ($request->hasFile('image')) {
            if ($variety->image) { Storage::disk('public')->delete($variety->image); }
            $incomingField['image'] = $request->file('image')->store('ricetypes', 'public');
        }

        $variety->update($incomingField);
        return redirect('/manage-varieties')->with('success', 'Variety updated successfully!');
    }

    public function deleteVariety(Variety $variety) {
        if (auth()->id() !== $variety->user_id) { abort(403); }

        if ($variety->image) {
            Storage::disk('public')->delete($variety->image);
        }

        $variety->delete();
        return redirect('/manage-varieties')->with('success', 'Deleted.');
    }
}