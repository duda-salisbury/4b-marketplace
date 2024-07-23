<div @class([
    'flex-grow-4 d-flex' => !$stacked
])>
    <div @class([
        'mb-3',
        'flex-grow-1 me-2' => !$stacked
    ])>
        <label for="vehicle_make_id" class="form-label">Make</label>
        <select name="vehicle_make_id" id="vehicle_make_id" class="form-select" wire:model="vehicle_make_id" wire:change="selectMake">
            <option value="">No Make Selected</option>
            @foreach($makes as $make)
                <option value="{{ $make->id }}">{{ $make->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div @class([
        'mb-3',
        'flex-grow-1 me-2' => !$stacked
    ])>
        <label for="vehicle_model_id" class="form-label">Model</label>
        <select name="vehicle_model_id" id="vehicle_model_id" class="form-select" wire:model.live="vehicle_model_id" wire:key="{{ $vehicle_make_id }}">
            <option value="">No Model Selected</option>
            @foreach($models as $model)
                <option value="{{ $model->id }}" @selected($vehicle_model_id === $model->id)>{{ $model->name }}</option>
            @endforeach
        </select>
    </div>
</div>
