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
        return view('listings.create');
    }

    public function submitCreate(CreateListingRequest $request) {
        $l = new Listing;
        $l->fill($request->validated());

        if ( $request->has('vehicle_make_id') ) {
            $make = VehicleMake::find($request->vehicle_make_id);
            $l->make()->associate($make);
        }

        if ( $request->has('vehicle_model_id') ) {
            $model = VehicleModel::find($request->vehicle_model_id);
            $l->model()->associate($model);
        }

        $l->save();

        return redirect()->route('listings')->with('success', 'Listing created successfully');
    }

    public function viewAll() {
        $listings = Listing::paginate(50);

        return view('listings.admin.index', compact('listings'));
    }
}
