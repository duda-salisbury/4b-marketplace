<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\VehicleMake;
use App\Models\VehicleModel;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class MakeModelSelect extends Component
{

    public string|null $vehicle_make_id;
    public string|null $vehicle_model_id;
    public Collection $makes;
    public Collection $models;

    public bool $stacked = false;

    public function mount(Request $request)
    {
        $this->makes = VehicleMake::orderBy('name')->get();
        $this->vehicle_make_id = old('vehicle_make_id', $request->vehicle_make_id);

        if ( $this->vehicle_make_id ) {
            $this->models = VehicleMake::find($this->vehicle_make_id)->models;
        } else {
            $this->models = collect();
        }

        $vehicle_model_id = old('vehicle_model_id', $request->vehicle_model_id);
        if ( $this->models->contains('id', $vehicle_model_id) ) {
            $this->vehicle_model_id = $vehicle_model_id;
        }
    }

    public function selectMake()
    {
        $make = VehicleMake::find($this->vehicle_make_id);
        if ( $make ) {
            $this->models = $make->models;
        } else {
            $this->models = collect();
            $this->vehicle_model_id = null;
        }
    }

    public function render()
    {
        return view('livewire.make-model-select');
    }
}
