<div>
    <div class="mb-3">
        <label for="name" class="form-label">Seller</label>
        <select name="name" id="name" class="form-select" wire:model="selected_seller_id" wire:change="selectSeller">
            <option value="">Select a seller</option>
            @foreach($sellers as $seller)
                <option value="{{ $seller->id }}">{{ $seller->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input wire:model="name" type="text" name="name" id="name"
            class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input wire:model="email" type="email" name="email" id="email"
            class="form-control" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input wire:model="phone" type="text" name="phone" id="phone"
            class="form-control" value="{{ old('phone') }}">
    </div>

    <div class="d-flex">
        <div class="mb-3 flex-grow-1">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" id="city" class="form-control" wire:model="city" value="{{ old('city') }}">
        </div>
        <div class="mb-3 flex-grow-1 ms-2">
            <label for="state" class="form-label">State</label>
            <select name="state" id="state" class="form-select" wire:model="state" value="{{ old('state') }}">
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="NY">New York</option>
                <!-- Add more options for other states -->
            </select>
        </div>
        <div class="mb-3 flex-grow-1 ms-2">
            <label for="zip" class="form-label">Zip</label>
            <input type="text" name="zip" id="zip" class="form-control" wire:model="zip" value="{{ old('zip')}}">
        </div>
    </div>
</div>
