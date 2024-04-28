<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\VehicleMake;
use App\Models\VehicleModel;
use Illuminate\Support\Collection;

class MakeModelSelect extends Component
{

    public string|null $vehicle_make_id;
    public string|null $vehicle_model_id;
    public Collection $makes;
    public Collection $models;

    public function mount()
    {
        $this->makes = VehicleMake::orderBy('name')->get();
        $this->models = old('vehicle_make_id') ? VehicleMake::find(old('vehicle_make_id'))->models : collect();
        $this->vehicle_make_id = old('vehicle_make_id');
        $this->vehicle_model_id = old('vehicle_model_id');
    }

    public function selectMake()
    {
        $this->models = VehicleMake::find($this->vehicle_make_id)->models;
    }

    public function render()
    {
        return view('livewire.make-model-select');
    }
}
