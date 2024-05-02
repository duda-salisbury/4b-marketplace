@extends('layouts.app');

@section('title', 'Create Listing')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/listing-create.css') }}">
@endsection

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

            <form action="{{ route('listings.submitCreate') }}" method="POST">
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
                                        <input type="text" name="model_year" id="model_year" class="form-control"
                                            value="{{ old('model_year') }}">
                                    </div>

                                    <livewire:make-model-select />

                                    <div class="flex-shrink-0 ms-2">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            value="{{ old('price') }}">
                                    </div>
                                </div>


                                <div class="d-flex">
                                    <!-- odometer -->
                                    <div class="mb-3">
                                        <label for="odometer" class="form-label">Odometer</label>
                                        <input type="number" min="0" name="odometer" id="odometer"
                                            class="form-control" value="{{ old('odometer') }}">
                                    </div>

                                    <!-- engine -->
                                    <div class="mb-3 ms-2 flex-grow-1">
                                        <label for="engine" class="form-label">Engine</label>
                                        <input type="text" name="engine" id="engine" class="form-control"
                                            value="{{ old('engine') }}">
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
                                        <input type="text" name="vin" id="vin" class="form-control"
                                            value="{{ old('vin') }}">
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
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" @selected(old('vehicle_type_id') === $type->id)>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <livewire:upload-carfax />

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
                            </div>
                        </div>

                    </div>
                </div>
                <style>


                </style>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-white">
                            <div class="card-header">
                                Photos
                                <small>(The first photo will be the main photo for the listing.)</small>
                            </div>
                            <div class="card-body listing-create-photos">

                               <livewire:gallery-select />

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
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="editor-tab" data-bs-toggle="tab"
                                        data-bs-target="#editor" type="button" role="tab" aria-controls="editor"
                                        aria-selected="true">Editor</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="preview-tab" data-bs-toggle="tab"
                                        data-bs-target="#preview" type="button" role="tab" aria-controls="preview"
                                        aria-selected="false">Preview</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="editor" role="tabpanel"
                                    aria-labelledby="editor-tab">
                                    <div class="card-body description-editor">
                                        <!-- markdown toolbar -->
                                        <div class="btn-group mb-3">
                                            <button type="button" class="btn btn-secondary"
                                                onclick="insertMarkdown('**','**')"><i
                                                    class="bi bi-type-bold"></i></button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="insertMarkdown('*','*')"><i
                                                    class="bi bi-type-italic"></i></button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="insertMarkdown('# ','')"><i class="bi bi-type-h2"></i></button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="insertMarkdown('## ','')"><i class="bi bi-type-h3"></i></button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="insertMarkdown('### ','')"><i class="bi bi-type-h4"></i></button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="insertMarkdown('[Link Text](url)','')"><i
                                                    class="bi bi-link"></i></button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="insertMarkdown('- ','')"><i class="bi bi-list-ul"></i></button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="insertMarkdown('> ','')"><i
                                                    class="bi bi-chat-quote"></i></button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="insertMarkdown('```','\n```')"><i
                                                    class="bi bi-code"></i></button>
                                        </div>
                                        <textarea name="content" id="description" rows="12" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="preview" role="tabpanel" aria-labelledby="preview-tab">
                                    <div class="card-body">
                                        <div id="previewContent"></div>
                                    </div>
                                </div>
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

@section('scripts')


    <script src="{{ asset('js/listing-create.js') }}"></script>
    <script src="{{ asset('js/markdown-editor.js') }}"></script>

@endsection
