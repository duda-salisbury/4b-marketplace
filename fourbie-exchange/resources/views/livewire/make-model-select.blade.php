<div class="flex-grow-4 d-flex">
    <div class="flex-grow-1 mb-3 me-2">
        <label for="vehicle_make_id" class="form-label">Make</label>
        <select name="vehicle_make_id" id="vehicle_make_id" class="form-select" wire:model="vehicle_make_id" wire:change="selectMake">
            @foreach($makes as $make)
                <option value="{{ $make->id }}">{{ $make->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="flex-grow-1 mb-3">
        <label for="vehicle_model_id" class="form-label">Model</label>
        <select name="vehicle_model_id" id="vehicle_model_id" class="form-select" wire:model.live="vehicle_model_id" wire:key="{{ $vehicle_make_id }}">
            @if (empty($vehicle_make_id) || empty($models))
                <option value="">Select a make first</option>
            @endif
            @foreach($models as $model)
                <option value="{{ $model->id }}" @selected($vehicle_model_id === $model->id)>{{ $model->name }}</option>
            @endforeach
        </select>
    </div>
</div>
