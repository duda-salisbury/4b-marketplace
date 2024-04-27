<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Http\Requests\CreateListingRequest;

class ListingController extends Controller
{
    public function create(CreateListingRequest $request) {
        Listing::create($request->validated());

        return redirect()->route('admin.listings')->with('success', 'Listing created successfully');
    }

    public function viewAll() {
        $listings = Listing::paginate(50);

        return view('listings.admin.index', compact('listings'));
    }
}
