<div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 align-items-stretch">
        <div class="col-lg-3 filters">
            <form class="filter-wrap">

                <!-- Make & Model -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Make &amp; Model</h5>
                    </div>
                    <div class="card-body">
                        <div class="position-relative">
                            <livewire:make-model-select :stacked="true" />
                        </div>
                        <div class="d-grid gap-2">
                            <button class="mt-3 btn btn-lg btn-success mt-4 btn-block" type="submit">View Results &raquo;</button>
                        </div>
                    </div>
                </div>

                <!-- Other Filters -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Other Filter Options</h5>
                    </div>
                    <div class="card-body">

                        <!-- min price -->
                        <label class="form-label" for="listingfilter-price_min">Min Price</label>
                        <input type="number" id="listingfilter-price_min" name="price_min" class="form-control" min="0" max="1850000" placeholder="$0" wire:model="price_min" />

                        <!-- max price -->
                        <label class="form-label mt-3" for="listingfilter-price_max">Max Price</label>
                        <input type="number" id="listingfilter-price_max" name="price_max" class="form-control" min="0" max="200000" placeholder="$200000" wire:model="price_max" />

                        <!-- Transmission Type -->
                        <div class="mt-4 filter-group mt-3">
                            <div class="form-label">Transmission</div>
                            <div class="form-check">
                                <input type="checkbox" name="transmission_types[]" id="listingfilter-transmission_type_Automatic" value="automatic" class="form-check-input" wire:model="transmission_types">
                                <label for="listingfilter-transmission_type_Automatic"
                                    class="form-check-label">Automatic</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="transmission_types[]"
                                    id="listingfilter-transmission_type_Manual" value="manual"
                                    class="form-check-input" wire:model="transmission_types">
                                <label for="listingfilter-transmission_type_Manual"
                                    class="form-check-label">Manual</label>
                            </div>
                        </div>

                        <!-- Fuel Type -->
                        <div class="mt-4 filter-group">
                            <div class="form-label">Fuel</div>
                            <div class="form-check">
                                <input type="checkbox" name="fuel_types[]"
                                    id="listingfilter-engine_fuel_Gasoline" value="gasoline"
                                    class="form-check-input" wire:model="fuel_types">
                                <label for="listingfilter-engine_fuel_Gasoline"
                                    class="form-check-label">Gasoline</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="fuel_types[]" id="listingfilter-engine_fuel_Diesel"
                                    value="diesel" class="form-check-input" wire:model="fuel_types">
                                <label for="listingfilter-engine_fuel_Diesel"
                                    class="form-check-label">Diesel</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="fuel_types[]" id="listingfilter-engine_fuel_Hybrid"
                                    value="hybrid" class="form-check-input" wire:model="fuel_types">
                                <label for="listingfilter-engine_fuel_Hybrid"
                                    class="form-check-label">Hybrid</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="fuel_types[]"
                                    id="listingfilter-engine_fuel_Electric" value="electric"
                                    class="form-check-input" wire:model="fuel_types">
                                <label for="listingfilter-engine_fuel_Electric"
                                    class="form-check-label">Electric</label>
                            </div>
                        </div>

                        <div class="mt-4 filter-group">
                            <div class="form-label">Vehicle Type</div>
                            <div class="form-check">
                                <input type="radio" name="vehicle_type" id="listingfilter-type_any"
                                    value="" class="form-check-input" wire:model="vehicle_type">
                                <label for="listingfilter-type_any" class="form-check-label">Any</label>
                            </div>
                            @foreach($vehicle_type_options as $vt)
                                <div class="form-check">
                                    <input type="radio" name="vehicle_type" id="listingfilter-type_{{ $vt->slug }}"
                                        value="{{ $vt->slug }}" class="form-check-input" wire:model="vehicle_type">
                                    <label for="listingfilter-type_{{ $vt->slug }}" class="form-check-label">{{ $vt->name }}</label>
                                </div>
                            @endforeach
                        </div>


                        <div class="mt-4 filter-group">
                            <div class="form-label">Era</div>
                            <div class="form-check">
                                <input type="checkbox" name="eras[]" id="listingfilter-era_pre-war"
                                    value="pre-war" class="form-check-input" wire:model="eras">
                                <label for="listingfilter-era_pre-war" class="form-check-label">Pre-War</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="eras[]" id="listingfilter-era_1950" value="1950"
                                    class="form-check-input" wire:model="eras">
                                <label for="listingfilter-era_1950" class="form-check-label">1950s</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="eras[]" id="listingfilter-era_1960" value="1960"
                                    class="form-check-input" wire:model="eras">
                                <label for="listingfilter-era_1960" class="form-check-label">1960s</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="eras[]" id="listingfilter-era_1970" value="1970"
                                    class="form-check-input" wire:model="eras">
                                <label for="listingfilter-era_1970" class="form-check-label">1970s</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="eras[]" id="listingfilter-era_1980" value="1980"
                                    class="form-check-input" wire:model="eras">
                                <label for="listingfilter-era_1980" class="form-check-label">1980s</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="eras[]" id="listingfilter-era_1990" value="1990"
                                    class="form-check-input" wire:model="eras">
                                <label for="listingfilter-era_1990" class="form-check-label">1990s</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="eras[]" id="listingfilter-era_2000" value="2000"
                                    class="form-check-input" wire:model="eras">
                                <label for="listingfilter-era_2000" class="form-check-label">2000s</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="eras[]" id="listingfilter-era_2010" value="2010"
                                    class="form-check-input" wire:model="eras">
                                <label for="listingfilter-era_2010" class="form-check-label">2010s</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="eras[]" id="listingfilter-era_2020" value="2020"
                                    class="form-check-input" wire:model="eras">
                                <label for="listingfilter-era_2020" class="form-check-label">2020s</label>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success btn-lg mt-3 btn-block" type="submit">
                                View Results &raquo;
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-lg-9 listing-results">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h1 class="card-title">Hot Listings</h1>
                            <h2 class="card-subtitle mb-2">Find your Perfect Fourbie.</h2>
                            <p class="card-text">Looking for a place to buy a new or used 4x4 or truck? You've
                                found
                                it. All the best overland and off-road trucks for sale near you, all in one place.
                            </p>
                            <a href="/sell" class="btn btn-secondary text-white">Sell Your Fourbie</a>
                        </div>
                    </div>
                </div>
                <div class="text-white my-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1">
                            {{ $listings->links() }}
                        </div>
                        <div class="ms-4">
                            <div class="select-filter">
                                <div class="form-group" style="display: flex;align-items: center;">
                                    <select style="padding-right:35px;" name="sortby" id="sortby" class="form-select dense" wire:model="sortby">
                                        <option value="date_desc">Newly Listed</option>
                                        <option value="date_asc">Oldest Listings</option>
                                        <option value="price_asc">Price (Low to High)</option>
                                        <option value="price_desc">Price (High to Low)</option>
                                        <option value="model_year_asc">Year (Oldest First)</option>
                                        <option value="model_year_desc">Year (Newest First)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($listings as $listing)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <x-listing-card :$listing />
                    </div>
                @endforeach

                @if($listings->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-warning">
                            No listings found.
                        </div>
                    </div>
                @endif

                <div>
                    {{ $listings->links() }}
                </div>
            </div>
        </div>



    </div>
</div>
