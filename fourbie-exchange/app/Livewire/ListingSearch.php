<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use App\Models\Listing;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ListingSearch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // Search Parameters
    public $vehicle_model_id;
    public $vehicle_make_id;
    public $price_min;
    public $price_max;
    public $transmission_types = [];
    public $fuel_types = [];
    public $vehicle_type;
    public $eras = [];
    public $sortby = 'date_desc';

    public $vehicle_type_options;

    public function mount(Request $request) {
        $this->vehicle_model_id = $request->vehicle_model_id;
        $this->vehicle_make_id = $request->vehicle_make_id;
        $this->price_min = $request->price_min;
        $this->price_max = $request->price_max;
        $this->transmission_types = $request->transmission_types ?? [];
        $this->fuel_types = $request->fuel_types ?? [];
        $this->vehicle_type = $request->vehicle_type;
        $this->eras = $request->eras ?? [];
        $this->sortby = $request->sortby ?? 'date_desc';

        $this->vehicle_type_options = VehicleType::all();
    }

    public function render()
    {
        $listings = Listing::with(['make', 'model', 'type'])->published();

        if ( $this->vehicle_model_id ) {
            $listings->where('vehicle_model_id', $this->vehicle_model_id);
        }

        if ( $this->vehicle_make_id ) {
            $listings->where('vehicle_make_id', $this->vehicle_make_id);
        }

        if ( $this->price_min ) {
            $listings->where('price', '>=', $this->price_min);
        }

        if ( $this->price_max ) {
            $listings->where('price', '<=', $this->price_max);
        }

        if ( $this->transmission_types ) {
            $listings->whereIn('transmission', $this->transmission_types);
        }

        if ( $this->fuel_types ) {
            $listings->whereIn('fuel_type', $this->fuel_types);
        }

        if ( $this->vehicle_type ) {
            $listings->whereRelation('type', 'slug', '=', $this->vehicle_type);
        }

        if ( $this->eras ) {
            $listings->where(function( Builder $query) {
                foreach ( $this->eras as $era ) {
                    $era_start = 0;
                    $era_end = date('Y') + 2;
                    if ( $era === 'pre-war' ) {
                        $era_end = 1949;
                    } else {
                        $era_start = (int) $era;
                        $era_end = (int) $era + 9;
                    }
                    $query->orWhere(function (Builder $q) use ($era_start, $era_end) {
                        $q->where('model_year', '>=', $era_start)
                            ->where('model_year', '<=', $era_end);
                    });
                }
            });
        }

        if ( $this->sortby == 'price_asc' ) {
            $listings = $listings->orderBy('price');
        } elseif ( $this->sortby == 'price_desc' ) {
            $listings = $listings->orderBy('price', 'desc');
        } elseif ( $this->sortby == 'model_year_asc' ) {
            $listings = $listings->orderBy('model_year');
        } elseif ( $this->sortby == 'model_year_desc' ) {
            $listings = $listings->orderBy('model_year', 'desc');
        } else {
            $listings = $listings->orderBy('created_at', 'desc');
        }

        $listings = $listings->paginate(30);
        return view('livewire.listing-search', compact('listings'));
    }
}
