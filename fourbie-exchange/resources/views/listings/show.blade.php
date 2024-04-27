@extends('layouts.app');

@section('title', 'Listing Details')

@section('content')
    <div class="container mt-5 pt-3">
        <nav id="single-breadcrumb" aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">

                    <!-- Back button -->

                    <a href="/listings">
                        <!-- left arrow bootstrap icon -->
                        Listings
                    </a>

                </li>
                <li class="breadcrumb-item"><a href="/listings/make/rivian">Jeep</a></li>
                <li class="breadcrumb-item"><a href="/listings/make/rivian/model/r1t">Other (Jeep)</a></li>
                <!-- seler name -->
                <li class="breadcrumb-item active d-none d-md-block" aria-current="page">1979 Jeep Wrangler</li>
            </ol>
        </nav>

        <div id="fe-classifiedsHeader" class="row sticky-element my-4">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <span class="fe-price mx-2 bg-success text-white badge
					
					">$17,900</span>

                    <h3 class="text-uppercase mb-0">1945 Willys Jeep CJ-2A</h3>
                </div>

                <div class="px-2 d-flex align-items-center">


                    <div>

                        <button class="btn btn-primary" data-toggle="modal" data-target="#contactSellerModal">Contact
                            Seller</button>

                    </div>

                </div>
            </div>
        </div>

        <div class="row img-hero d-none d-md-flex pt-3">
            <div class="col-md-9 p-0 img-hero-hero">
                <a href="/listings/show/media#1">
                    <img src="https://fourbieexchange.com/wp-content/uploads/2024/04/1945-willys-jeep-cj-2a-5.jpg"
                        class="img-fluid" alt="1945-willys-jeep-cj-2a (5)">
                </a>
            </div>
            <div class="col-md-3 hero-thumbs p-0">
                <div class="thumb-container">
                    <a href="/listings/show/media#2">
                        <img src="https://fourbieexchange.com/wp-content/uploads/2024/04/1945-willys-jeep-cj-2a-1.jpg"
                            class="img-fluid" alt="1945-willys-jeep-cj-2a (1)">
                    </a>

                    <a class="view-more" href="/listings/show/media#3">
                        <img src="https://fourbieexchange.com/wp-content/uploads/2024/04/1945-willys-jeep-cj-2a.jpg"
                            class="img-fluid" alt="1945-willys-jeep-cj-2a">
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8">
                <div class="fe-VehicleSpecs my-4 bg-white">
                    <ul class="list-group d-flex ">
                        <li class="list-group-item">Year: 1973</li>
                        <li class="list-group-item">Make: Jeep</li>
                        <li class="list-group-item">Model: Wrangler</li>
                        <li class="list-group-item">Mileage: 100,000</li>
                        <li class="list-group-item">Transmission: Manual</li>
                        <li class="list-group-item">Engine: 4.2L Inline 6</li>
                        <li class="list-group-item">Drivetrain: 4x4</li>
                    </ul>
                </div>

                <div class="card bg-white">
                    <div class="card-header">
                        Description
                    </div>
                    <div class="card-body">
                        <p>We are excited to offer this RARE 1st year 1945 Willys Jeep CJ-2A.

                            This Jeep is the first civilian version built but it has been made to look like the military version. This jeep is a blast to drive and gets tons of attention and runs great. In preparation for sale this CJ-2A got new tires, new battery, new carburetor, rebuilt gas tank, new gas lines, new brake lines, new starter, rebuilt transmission, new fuel pump, new rotor, plugs and points. This Willys Jeep is easy to start and we’ve reached 50mph on GPS. Seat Belts have been added for safety. The oil pressure gauge works, the wipers work, the temp gauge works, the headlights work and the black out light on the driver fender works. This Willys CJ-2A would be great for getting around the neighborhood, running errands, running around the ranch, parades or used at the lake house or beach! We can ship anywhere in the US and offer Airport Pickup. Third Party Inspections always welcome. Call, TEXT or Email anytime!
                        </p>
                    </div>
                </div>

                <div class="card bg-white mt-4">
                    <div class="card-header">
                        Price Guide
                    </div>
                    <div class="card-body">
                        <iframe loading="lazy" style="border: 0;" src="https://www.classic.com/widget/K9KoQs2vx3uv4z/" width="100%" height="450"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4">


                <div class="card my-4 seller-info">
                    <div class="card-body">

                        <span class="d-block pb-2">


                            <i class="fas fa-store mr-2"></i>
                            <a href="/seller/rogers-motorcars">
                                Rogers Motorcars </a>
                        </span>

                        <span class="d-block pb-2">
                            <i class="fas fa-map-marker-alt mr-2"></i>

                            Houston, TX </span>

                        <!-- phone -->
                        <span class="d-block pb-2">
                            <i class="fas fa-phone mr-2"></i>
                            <!-- link to call -->
                            <a href="tel:(832) 371-9396">
                                (832) 371-9396 </a>
                        </span>

                        <!-- email -->
                        <span class="d-block pb-2">
                            <i class="fas fa-envelope mr-2"></i>
                            rogersmotorcars@gmail.com </span>

                        <!-- website -->
                        <span class="d-block pb-2">
                            <!-- external link icon -->
                            <i class="fas fa-external-link-alt mr-2"></i>
                            <a href="https://www.rogersmotorcars.com/" target="_blank">
                                View on Seller Website
                            </a>
                        </span>

                        <!-- contact seller button -->
                        <!-- Button to trigger the modal -->
                        <button class="btn btn-primary btn-block" data-toggle="modal"
                            data-target="#contactSellerModal">Contact Seller</button>
                    </div>
                </div>



            </div>
        </div>
