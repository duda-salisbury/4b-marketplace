<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use App\Http\Requests\CreateListingRequest;

class ListingController extends Controller
{

    public function create() {
        $makes = VehicleMake::all();
        $models = VehicleModel::all();
        $types = VehicleType::all();

        return view('listings.create', compact('makes', 'models', 'types'));
    }

    public function submitCreate(CreateListingRequest $request) {
        Listing::create($request->validated());

        return redirect()->route('listings')->with('success', 'Listing created successfully');
    }

    public function viewAll() {
        $listings = Listing::paginate(50);

        return view('listings.admin.index', compact('listings'));
    }
}
