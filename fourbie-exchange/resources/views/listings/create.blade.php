@extends('layouts.app');

@section('title', 'Create Listing')

@section('content')
    <div class="bg-dark py-5">
        <div class="container pt-4">
            <h1 class="text-white mb-4">Create Listing</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('listings.submitCreate')}}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card bg-white">
                            <div class="card-header">
                                Listing Information
                            </div>
                            <div class="card-body">


                                    <div class="d-flex">
                                        <div class="flex-shrink-0 mb-3 me-2" style="width: 100px;">
                                            <label for="model_year" class="form-label">Year</label>
                                            <input type="text" name="model_year" id="model_year" class="form-control" value="{{ old('model_year') }}">
                                        </div>

                                        <livewire:make-model-select />

                                        <div class="flex-shrink-0 ms-2">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
                                        </div>
                                    </div>


                                    <div class="d-flex">
                                        <!-- odometer -->
                                        <div class="mb-3">
                                            <label for="odometer" class="form-label">Odometer</label>
                                            <input type="number" min="0" name="odometer" id="odometer" class="form-control" value="{{ old('odometer') }}">
                                        </div>

                                        <!-- engine -->
                                        <div class="mb-3 ms-2 flex-grow-1">
                                            <label for="engine" class="form-label">Engine</label>
                                            <input type="text" name="engine" id="engine" class="form-control" value="{{ old('engine') }}">
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <!-- fuel type -->
                                        <div class="mb-3 flex-grow-1">
                                            <label for="fuelType" class="form-label">Fuel Type</label>
                                            <select name="fuel_type" id="fuelType" class="form-select">
                                                <option value="gasoline" @selected(old('fuel_type') === 'gasoline')>Gasoline</option>
                                                <option value="diesel" @selected(old('fuel_type') === 'diesel')>Diesel</option>
                                                <option value="electric" @selected(old('fuel_type') === 'electric')>Electric</option>
                                            </select>
                                        </div>

                                        <!-- transmission form-select -->
                                        <div class="mb-3 ms-2 flex-grow-1">
                                            <label for="transmission" class="form-label">Transmission</label>
                                            <select name="transmission" id="transmission" class="form-select">
                                                <option value="automatic" @selected(old('transmission') === 'automatic')>Automatic</option>
                                                <option value="manual" @selected(old('transmission') === 'manual')>Manual</option>
                                            </select>
                                        </div>

                                        <!-- drivetrain 4x4, 4x2, AWD -->
                                        <div class="mb-3 ms-2">
                                            <label for="drivetrain" class="form-label">Drivetrain</label>
                                            <select name="drivetrain" id="drivetrain" class="form-select">
                                                <option value="4x4" @selected(old('drivetrain') === '4x4')>4x4</option>
                                                <option value="4x2" @selected(old('drivetrain') === '4x2')>4x2</option>
                                                <option value="awd" @selected(old('drivetrain') === 'awd')>AWD</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex">

                                        <div class="mb-3 flex-grow-1">
                                            <label for="vin" class="form-label">VIN/Chassis #</label>
                                            <input type="text" name="vin" id="vin" class="form-control" value="{{ old('vin') }}">
                                        </div>

                                        <!-- title status -->
                                        <div class="mb-3 ms-2 flex-grow-1">
                                            <label for="titleStatus" class="form-label">Title Status</label>
                                            <select name="title_status" id="titleStatus" class="form-select">
                                                <option value="">Select One</option>
                                                <option value="clean" @selected(old('title_status') === 'clean')>Clean</option>
                                                <option value="salvage" @selected(old('title_status') === 'salvage')>Salvage</option>
                                                <option value="rebuilt" @selected(old('title_status') === 'rebuilt')>Rebuilt</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- vehicle type -->
                                    <div class="mb-3">
                                        <label for="vehicleType" class="form-label">Vehicle Type</label>
                                        <!-- multiple select -->
                                        <select name="vehicleType" id="vehicleType" class="form-select" multiple>
                                            <option value="Japanese">Japanese</option>
                                            <option value="Import">Import</option>
                                            <option value="Expedition">Expedition Vehicles</option>
                                            <option value="Military">Military Vehicles</option>
                                            <option value="Van">Van</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <!-- Carfax Upload -->
                                        <label for="carfax" class="form-label">Carfax</label>
                                        <input type="file" name="carfax" id="carfax" class="form-control">
                                    </div>


                                    <!-- excerpt -->
                                    <div class="mb-3">
                                        <label for="excerpt" class="form-label">Excerpt</label>
                                        <textarea name="excerpt" id="excerpt" class="form-control">{{ old('content') }}</textarea>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">


                        <!-- card for listing type, two buttons (standard, premium) -->
                        <div class="card mb-4 bg-white">
                            <div class="card-header">
                                Listing Type
                            </div>
                            <div class="card-body">

                                <!-- radio buttons for listing type -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="listingType" id="standard"
                                        value="listing" checked>
                                    <label class="form-check-label" for="standard">
                                        Standard
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="listingType" id="premium"
                                        value="premium">
                                    <label class="form-check-label" for="premium">Premium</label>
                                </div>


                            </div>
                        </div>

                        <!-- card for seller info (name (dropdown), email, phone) -->
                        <div class="card mt-4 bg-white">
                            <div class="card-header">
                                Seller Info
                                <small>(Automatically populated when a seller is selected.)</small>
                            </div>
                            <div class="card-body">

                                    <livewire:seller-select-create />
                                    {{-- <div class="mb-3">
                                        <label for="sellerType" class="form-label">Seller Type</label>
                                        <select name="sellerType" id="sellerType" class="form-select">
                                            <option value="private">Private Seller</option>
                                            <option value="dealer">Dealer</option>
                                        </select>
                                    </div> --}}

                                    {{-- <div class="mb-3">
                                        <label for="name" class="form-label">Seller</label>
                                        <select name="name" id="name" class="form-select">
                                            <option value="Private Party">Private Party</option>
                                            <option value="ABC Motors">ABC Motors</option>
                                            <option value="XYZ Autos">XYZ Autos</option>
                                            <option value="123 Cars">123 Cars</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input value="sup@privateparty.com" type="email" name="email" id="email"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input value="888-888-8888" type="text" name="phone" id="phone"
                                            class="form-control">
                                    </div>


                                    <div class="d-flex">

                                        <div class="mb-3 flex-grow-1">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" name="city" id="city" class="form-control">
                                        </div>
                                        <div class="mb-3 flex-grow-1 ms-2">
                                            <label for="state" class="form-label">State</label>
                                            <select name="state" id="state" class="form-select">
                                                <option value="AL">Alabama</option>
                                                <option value="AK">Alaska</option>
                                                <option value="AZ">Arizona</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="CA">California</option>
                                                <!-- Add more options for other states -->
                                            </select>
                                        </div>
                                        <div class="mb-3 flex-grow-1 ms-2">
                                            <label for="zip" class="form-label">Zip</label>
                                            <input type="text" name="zip" id="zip" class="form-control">
                                        </div>
                                    </div> --}}
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-white">
                            <div class="card-header">
                                Photos
                                <small>(The first photo will be the main photo for the listing.)</small>
                            </div>
                            <div class="card-body">

                                <label for="photos" class="form-label">Photo Gallery</label>
                                <input type="file" name="photos" id="photos[]" class="form-control">

                                <div class="row mt-4">
                                    <div class="col-md-3">
                                        <img src="https://via.placeholder.com/150" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="https://via.placeholder.com/150" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="https://via.placeholder.com/150" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="https://via.placeholder.com/150" alt="" class="img-fluid">

                                    </div>
                                </div>

                                <!-- hero image (for premium listings) -->

                                <div class="mt-4">
                                    <label for="heroImage" class="form-label">Hero Image</label>
                                    <input type="file" name="heroImage" id="heroImage" class="form-control">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


                <!-- description gets its own row, supports markdown -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-white mt-4">
                            <div class="card-header">
                                Description
                            </div>
                            <div class="card-body">
                                <!-- markdown toolbar -->
                                <div class="btn-group mb-3">
                                    <button type="button" class="btn btn-secondary"><i class="bi bi-type-bold"></i></button>
                                    <button type="button" class="btn btn-secondary"><i
                                            class="bi bi-type-italic"></i></button>
                                    <button type="button" class="btn btn-secondary"><i class="bi bi-type-h2"></i></button>
                                    <button type="button" class="btn btn-secondary"><i class="bi bi-type-h3"></i></button>
                                    <button type="button" class="btn btn-secondary"><i class="bi bi-type-h4"></i></button>
                                    <button type="button" class="btn btn-secondary"><i class="bi bi-link"></i></button>
                                    <button type="button" class="btn btn-secondary"><i class="bi bi-list-ul"></i></button>
                                    <button type="button" class="btn btn-secondary"><i
                                            class="bi bi-chat-quote"></i></button>
                                    <button type="button" class="btn btn-secondary"><i class="bi bi-code"></i></button>
                                </div>


                                <textarea name="content" id="description" rows="12" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-success">Create Listing</button>
                    </div>

                </div>

            </form>

        </div>
    </div>

@endsection
