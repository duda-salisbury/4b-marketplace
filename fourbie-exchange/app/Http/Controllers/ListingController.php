<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Dealer;
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
        $l->fill($request->safe()->except(['name', 'phone', 'email', 'zip', 'carfax_upload_id', 'photo_id']));

        $make = VehicleMake::find($request->vehicle_make_id);
        $l->make()->associate($make);

        if ( $request->has('vehicle_model_id') ) {
            $model = VehicleModel::find($request->vehicle_model_id);
            $l->model()->associate($model);
        }
        
        $dealer = Dealer::find($request->dealer_id);
        if ( !$request->input('dealer_id') ) {
            $dealer = Dealer::firstOrNew(['email' => $request->email]);
            $dealer->name = $request->name;
            $dealer->phone = $request->phone;
            $dealer->email = $request->email;
            $dealer->city = $request->city;
            $dealer->state = $request->state;
            $dealer->zip = $request->zip;
            $dealer->save();
        }
        $l->dealer()->associate($dealer);

        if ( $request->has('carfax_upload_id') ) {
            $l->carfax_id = $request->carfax_upload_id;
        }

        $l->save();

        // Add Gallery Images
        if ( $request->input('photo_id') && count($request->photo_id) > 0 ) {
            $createMany = array_map(function($photo_id) {
                return ['image_id' => $photo_id];
            }, $request->photo_id);
            $l->listing_images()->createMany($createMany);
        }

        return redirect()->route('listings')->with('success', 'Listing created successfully');
    }

    public function viewAll() {
        $listings = Listing::paginate(50);

        return view('listings.admin.index', compact('listings'));
    }

    public function adminShow($id) {
        $listing = Listing::with(['make', 'model', 'dealer', 'images'])->findOrFail($id);

        return view('listings.admin.show', compact('listing'));
    }
}
