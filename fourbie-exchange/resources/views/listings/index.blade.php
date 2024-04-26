@extends('layouts.app');
@section('title', 'Listings')

@section('content')
    <section class="featured-classifieds mt-4 py-5 bg-dark">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 align-items-stretch">
                <div class="col-lg-3 filters">
                    <form hx-trigger="change" hx-boost="true" hx-indicator=".fourbie-main-results"
                        hx-target=".fourbie-main-results" hx-swap="outerHTML" hx-select=".fourbie-main-results"
                        class="filter-wrap" id="listing-form" action="/listings" method="GET">

                        <!-- make and model selects -->
                        <div class="card mb-4">

                            <div class="card-header">
                                <h5>Make &amp; Model</h5>
                            </div>

                            <div class="card-body">

                                <div class="position-relative">

                                    <!-- Select Make -->
                                    <div class="select-filter">
                                        <div class="form-group">
                                            <label class="form-label" for="listingfilter-vehicle-make">Select a Make</label>
                                            <select hx-boost="false" hx-indicator=".model-filter"
                                                hx-select="#listingfilter-model-formgroup" name="vehicle-make"
                                                id="listingfilter-vehicle-make" class="form-control form-select"
                                                hx-get="/wp-content/themes/astra-child/htmx/model-select.php"
                                                hx-target="#listingfilter-model-formgroup">
                                                <option value="" selected>All Makes</option>
                                                <option value="am-general">AM General</option>
                                                <option value="amc">AMC</option>
                                                <option value="chevrolet">Chevrolet</option>
                                                <option value="daihatsu">Daihatsu</option>
                                                <option value="dodge">Dodge</option>
                                                <option value="earthroamer">EarthRoamer</option>
                                                <option value="ford">Ford</option>
                                                <option value="gmc">GMC</option>
                                                <option value="honda">Honda</option>
                                                <option value="hummer">HUMMER</option>
                                                <option value="ineos">INEOS</option>
                                                <option value="international-harvester">International Harvester</option>
                                                <option value="isuzu">Isuzu</option>
                                                <option value="jeep">Jeep</option>
                                                <option value="land-rover">Land Rover</option>
                                                <option value="lexus">Lexus</option>
                                                <option value="mazda">Mazda</option>
                                                <option value="mercedes-benz">Mercedes-Benz</option>
                                                <option value="mitsubishi">Mitsubishi</option>
                                                <option value="nissan">Nissan</option>
                                                <option value="other">Other</option>
                                                <option value="porsche">Porsche</option>
                                                <option value="ram">RAM</option>
                                                <option value="rivian">Rivian</option>
                                                <option value="steyr-puch">Steyr-Puch</option>
                                                <option value="subaru">Subaru</option>
                                                <option value="suzuki">Suzuki</option>
                                                <option value="tesla">Tesla</option>
                                                <option value="toyota">Toyota</option>
                                                <option value="volkswagen">Volkswagen</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="position-relative">

                                    <!-- Select Model -->
                                    <div class="select-filter model-filter">
                                        <div class="form-group" id="listingfilter-model-formgroup">
                                            <label name="model" for="listingfilter-model"
                                                class="form-label">Models</label>
                                            <select name="model" id="listingfilter-model" class="form-control form-select"
                                                disabled>
                                                <option value="" selected>First select a make.</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <button class="mt-3 btn btn-sm btn-secondary btn-block" type="submit">View Results
                                    &raquo;</button>
                            </div>



                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    Other Filter Options
                                </h5>
                            </div>
                            <div class="card-body">


                                <!-- min price -->
                                <label class="form-label" for="listingfilter-price_min">Min Price</label>
                                <input type="number" id="listingfilter-price_min" name="price_min" class="form-control"
                                    min="0" max="1850000" placeholder="$0" />

                                <!-- max price -->
                                <label class="form-label" for="listingfilter-price_max">Max Price</label>
                                <input type="number" id="listingfilter-price_max" name="price_max" class="form-control"
                                    min="0" max="1850000" placeholder="$1850000" />

                                <!-- Transmission Type -->
                                <div class="mt-4 filter-group" style="border-bottom:1px solid #000;">
                                    <div class="form-label">Transmission</div>
                                    <div class="form-check">
                                        <input type="checkbox" name="transmission_type[]"
                                            id="listingfilter-transmission_type_Automatic" value="Automatic"
                                            class="form-check-input">
                                        <label for="listingfilter-transmission_type_Automatic"
                                            class="form-check-label">Automatic</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="transmission_type[]"
                                            id="listingfilter-transmission_type_Manual" value="Manual"
                                            class="form-check-input">
                                        <label for="listingfilter-transmission_type_Manual"
                                            class="form-check-label">Manual</label>
                                    </div>
                                </div>

                                <!-- Fuel Type -->
                                <div class="mt-4 filter-group" style="border-bottom:1px solid #000;">
                                    <div class="form-label">Fuel</div>
                                    <div class="form-check">
                                        <input type="checkbox" name="engine_fuel[]"
                                            id="listingfilter-engine_fuel_Gasoline" value="Gasoline"
                                            class="form-check-input">
                                        <label for="listingfilter-engine_fuel_Gasoline"
                                            class="form-check-label">Gasoline</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="engine_fuel[]" id="listingfilter-engine_fuel_Diesel"
                                            value="Diesel" class="form-check-input">
                                        <label for="listingfilter-engine_fuel_Diesel"
                                            class="form-check-label">Diesel</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="engine_fuel[]" id="listingfilter-engine_fuel_Hybrid"
                                            value="Hybrid" class="form-check-input">
                                        <label for="listingfilter-engine_fuel_Hybrid"
                                            class="form-check-label">Hybrid</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="engine_fuel[]"
                                            id="listingfilter-engine_fuel_Electric" value="Electric"
                                            class="form-check-input">
                                        <label for="listingfilter-engine_fuel_Electric"
                                            class="form-check-label">Electric</label>
                                    </div>
                                </div>

                                <!-- Vehicle Type -->
                                <div class="mt-4 filter-group" style="border-bottom:1px solid #000;">
                                    <div class="form-label">Vehicle Type</div>
                                    <div class="form-check">
                                        <input type="radio" name="vehicle_type" id="listingfilter-type_any"
                                            value="" class="form-check-input" checked='checked' />
                                        <label for="listingfilter-type_any" class="form-check-label">Any</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="vehicle_type" id="listingfilter-type_american"
                                            value="american" class="form-check-input">
                                        <label for="listingfilter-type_american" class="form-check-label">American</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="vehicle_type" id="listingfilter-type_european"
                                            value="european" class="form-check-input">
                                        <label for="listingfilter-type_european" class="form-check-label">European</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="vehicle_type"
                                            id="listingfilter-type_expedition-vehicles" value="expedition-vehicles"
                                            class="form-check-input">
                                        <label for="listingfilter-type_expedition-vehicles"
                                            class="form-check-label">Expedition Vehicles</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="vehicle_type" id="listingfilter-type_imports"
                                            value="imports" class="form-check-input">
                                        <label for="listingfilter-type_imports" class="form-check-label">Imports</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="vehicle_type" id="listingfilter-type_japanese"
                                            value="japanese" class="form-check-input">
                                        <label for="listingfilter-type_japanese" class="form-check-label">Japanese</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="vehicle_type"
                                            id="listingfilter-type_military-service-vehicles"
                                            value="military-service-vehicles" class="form-check-input">
                                        <label for="listingfilter-type_military-service-vehicles"
                                            class="form-check-label">Military &amp; Service Vehicles</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="vehicle_type" id="listingfilter-type_projects"
                                            value="projects" class="form-check-input">
                                        <label for="listingfilter-type_projects" class="form-check-label">Projects</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="vehicle_type" id="listingfilter-type_suvs"
                                            value="suvs" class="form-check-input">
                                        <label for="listingfilter-type_suvs" class="form-check-label">SUVs</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="vehicle_type" id="listingfilter-type_trucks"
                                            value="trucks" class="form-check-input">
                                        <label for="listingfilter-type_trucks" class="form-check-label">Trucks</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="vehicle_type" id="listingfilter-type_vans-campers"
                                            value="vans-campers" class="form-check-input">
                                        <label for="listingfilter-type_vans-campers" class="form-check-label">Vans &amp;
                                            Campers</label>
                                    </div>
                                </div>

                                <!-- Era -->
                                <div class="mt-4 filter-group">
                                    <div class="form-label">Era</div>
                                    <div class="form-check">
                                        <input type="checkbox" name="era[]" id="listingfilter-era_pre-war"
                                            value="pre-war" class="form-check-input">
                                        <label for="listingfilter-era_pre-war" class="form-check-label">Pre-War</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="era[]" id="listingfilter-era_1950" value="1950"
                                            class="form-check-input">
                                        <label for="listingfilter-era_1950" class="form-check-label">1950s</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="era[]" id="listingfilter-era_1960" value="1960"
                                            class="form-check-input">
                                        <label for="listingfilter-era_1960" class="form-check-label">1960s</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="era[]" id="listingfilter-era_1970" value="1970"
                                            class="form-check-input">
                                        <label for="listingfilter-era_1970" class="form-check-label">1970s</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="era[]" id="listingfilter-era_1980" value="1980"
                                            class="form-check-input">
                                        <label for="listingfilter-era_1980" class="form-check-label">1980s</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="era[]" id="listingfilter-era_1990" value="1990"
                                            class="form-check-input">
                                        <label for="listingfilter-era_1990" class="form-check-label">1990s</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="era[]" id="listingfilter-era_2000" value="2000"
                                            class="form-check-input">
                                        <label for="listingfilter-era_2000" class="form-check-label">2000s</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="era[]" id="listingfilter-era_2010" value="2010"
                                            class="form-check-input">
                                        <label for="listingfilter-era_2010" class="form-check-label">2010s</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="era[]" id="listingfilter-era_2020" value="2020"
                                            class="form-check-input">
                                        <label for="listingfilter-era_2020" class="form-check-label">2020s</label>
                                    </div>
                                </div>
                                <button class="btn btn-secondary btn-sm ma-auto btn-block" type="submit">
                                    View Results &raquo;
                                </button>

                            </div>
                        </div>

                        <div class="card">

                            <div class="card-body d-flex justify-content-between align-items-center d-xs-flex d-lg-none"
                                style="position: fixed; left:0px; width:100%; bottom:0px; background:white; padding:10px;">
                                <button class="form-close btn btn-outline-secondary btn-sm" type="button">
                                    Close
                                </button>

                                <button class="btn btn-primary btn-sm form-close">
                                    View Results &raquo;
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="orderby" id="form-fields-orderby" value="" />
                        <input type="hidden" name="order" id="form-fields-order" value="" />

                    </form>


                </div>



                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="vert-card card h-100">
                                <img src="{{ asset('img/7.jpg') }}" class="card-img-top" alt="Vehicle Image">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center px-2">
                                        <span class="badge bg-success">$18,000</span>
                                        <span class="badge">accepting offers</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">2019 Jeep Grand Cherokee Limited</h5>
                                    <p class="card-text">
                                        3.6L V6, 8-Speed Automatic, 4-Wheel Drive, SUV, Excellent Condition, Bright White
                                        Clearcoat
                                    </p>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            speed
                                        </span>
                                        32,000 miles
                                    </li>

                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            account_circle
                                        </span>
                                        Northeast Auto Gallery, LLC
                                    </li>
                                </ul>

                                <div class="card-footer text-end">
                                    <span class="material-symbols-outlined">
                                        location_on
                                    </span>
                                    Plainfield, CT
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="vert-card card h-100">
                                <img src="{{ asset('img/8.jpg') }}" class="card-img-top" alt="Vehicle Image">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center px-2">
                                        <span class="badge bg-primary">$18,000</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">2022 Ford Ranger XLT</h5>
                                    <p class="card-text">
                                        2.3L EcoBoost, 10-Speed Automatic, 4-Wheel Drive, Pickup Truck, Like New, Oxford
                                        White
                                    </p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            speed
                                        </span>
                                        32,000 miles
                                    </li>

                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            account_circle
                                        </span>
                                        Northeast Auto Gallery, LLC
                                    </li>
                                </ul>


                                <div class="card-footer text-end">
                                    <span class="material-symbols-outlined">
                                        location_on
                                    </span>
                                    Plainfield, CT
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class=" vert-card card h-100">
                                <img src="{{ asset('img/9.jpg') }}" class="card-img-top" alt="Vehicle Image">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center px-2">
                                        <span class="badge bg-primary">$18,000</span>
                                        <span class="badge">accepting offers</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">2021 Chevrolet Silverado 1500 LT Trail Boss</h5>
                                    <p class="card-text">
                                        5.3L V8, 8-Speed Automatic, 4-Wheel Drive, Crew Cab, Well-Maintained, Satin Steel
                                        Metallic
                                    </p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            speed
                                        </span>
                                        32,000 miles
                                    </li>

                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            account_circle
                                        </span>
                                        Northeast Auto Gallery, LLC
                                    </li>
                                </ul>
                                <div class="card-footer text-end">
                                    <span class="material-symbols-outlined">
                                        location_on
                                    </span>
                                    Plainfield, CT
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="vert-card card h-100">
                                <img src="{{ asset('img/10.jpg') }}" class="card-img-top" alt="Vehicle Image">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-primary">$18,000</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">2020 GMC Sierra 2500HD Denali</h5>
                                    <p class="card-text">
                                        6.6L V8, 10-Speed Automatic, 4-Wheel Drive, Crew Cab, Fully Loaded, Onyx Black
                                    </p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            speed
                                        </span>
                                        32,000 miles
                                    </li>

                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            account_circle
                                        </span>
                                        Northeast Auto Gallery, LLC
                                    </li>
                                </ul>
                                <div class="card-footer text-end">
                                    <span class="material-symbols-outlined">
                                        location_on
                                    </span>
                                    Plainfield, CT
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="vert-card card h-100">
                                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="Vehicle Image">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center px-2">
                                        <span class="badge bg-success">$18,000</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">2018 Toyota Tacoma TRD Off-Road</h5>
                                    <p class="card-text">
                                        3.5L V6, 6-Speed Automatic, 4-Wheel Drive, Access Cab, Off-Road Ready, Cement Gray
                                    </p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            speed
                                        </span>
                                        32,000 miles
                                    </li>

                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            account_circle
                                        </span>
                                        <a href="#">
                                            Northeast Auto Gallery, LLC
                                        </a>
                                    </li>
                                </ul>
                                <div class="card-footer text-end">
                                    <span class="material-symbols-outlined">
                                        location_on
                                    </span>
                                    Plainfield, CT
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="vert-card card h-100">
                                <img src="{{ asset('img/2.jpg') }}" class="card-img-top" alt="Vehicle Image">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center px-2">
                                        <span class="badge bg-success">$18,000</span>
                                        <span class="badge bg-blue">accepting offers</span>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">2018 Toyota Tacoma TRD Off-Road</h5>
                                    <p class="card-text">
                                        3.5L V6, 6-Speed Automatic, 4-Wheel Drive, Access Cab, Off-Road Ready, Cement Gray
                                    </p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            speed
                                        </span>
                                        32,000 miles
                                    </li>

                                    <li class="list-group-item">
                                        <span class="material-symbols-outlined">
                                            account_circle
                                        </span>
                                        <a href="#">Northeast Auto Gallery, LLC</a>
                                    </li>
                                </ul>
                                <div class="card-footer text-end">
                                    <span class="material-symbols-outlined">
                                        location_on
                                    </span>
                                    Plainfield, CT
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

@endsection
