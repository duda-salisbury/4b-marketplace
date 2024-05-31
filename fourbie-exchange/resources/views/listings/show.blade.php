@extends('layouts.app')

@section('title', 'Listing Details - {{ $listing->title }}')

@section('content')
    <div class="container mt-5 pt-3">
        <nav id="single-breadcrumb" aria-label="breadcrumb" class="mt-5">
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
                <li class="breadcrumb-item d-none d-md-block text-white" aria-current="page">1979 Jeep Wrangler</li>
            </ol>
        </nav>

        <div id="fe-classifiedsHeader" class="row sticky-element my-4 bg-light py-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <span class="fe-price mx-2 bg-success text-white badge
					
					">$17,900</span>

                    <h3 class="text-uppercase mb-0 me-3">{{ $listing->title }}</h3>
                    <span class="fe-vehicle-type badge bg-grey">SUV</span>

                </div>

                <div class="px-2 d-flex align-items-center">


                    <div>

                        <button class="btn btn-primary" data-toggle="modal" data-target="#contactSellerModal">Contact
                            Seller</button>

                    </div>

                </div>
            </div>
        </div>


                <ul class="nav nav-tabs">
                    <!-- back to listing -->
                    <li class="nav-item">
                        <a class="nav-link active" href="/listings/show">
                            <!-- left arrow bootstrap icon -->
                            Vehicle Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/listings/media">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/listings/media">Videos</a>
                    </li>
                </ul>
        <div class="row img-hero d-none d-md-flex pt-3">
            <div class="col-md-9 img-hero-hero">
                <a href="/listings/media">
                    <img src="{{ $listing->images[0]->url}}"
                        class="img-fluid" alt="1945-willys-jeep-cj-2a (5)">
                </a>
            </div>
            <div class="col-md-3 hero-thumbs">
                <div class="thumb-container">
                    <a href="/listings/media">
                        <img src="https://fourbieexchange.com/wp-content/uploads/2024/04/1945-willys-jeep-cj-2a-1.jpg"
                            class="img-fluid" alt="1945-willys-jeep-cj-2a (1)">
                    </a>

                    <a class="view-more" href="/listings/media">
                        <img src="https://fourbieexchange.com/wp-content/uploads/2024/04/1945-willys-jeep-cj-2a.jpg"
                            class="img-fluid" alt="1945-willys-jeep-cj-2a">
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8 fe-VehicleDescription">
                <div class="bg-white p-3">
                    <div class="mb-4">
                        <h2>Description</h2>
                        <p>{{ $listing->content }}</p>
                </div>
                <h2 class="mt-4 text-white">Videos</h2>
                <div id="videoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="ratio ratio-16x9">
                                <iframe src="//www.youtube.com/embed/Tlz2X9nMbUA" title="YouTube video player" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                
                    <button class="carousel-control-prev" type="button" data-bs-target="#videoCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#videoCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                


                <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
                    <div class="col-md-8">
                        <h4 class="alert-heading">Contact the Seller</h4>
                        <!-- name of seller, and location -->
                        <p class="mb-0">Rogers Motorcars - Houston, TX</p>

                    </div>
                    <div class="col-md-4 d-grid grid-gap-2 ">
                        <button class="btn btn-success" data-toggle="modal" data-target="#contactSellerModal">Contact Seller</button>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="fe-vehicleSpecs d-none d-md-block">
                    <!-- odometer -->
                    <div class="fe-vehicleSpecs__item">
                        <h3>Odometer</h3>
                        <h5>625</h5>
                    </div>

                    <div class="fe-vehicleSpecs__item">
                        <h3>Year</h3>
                        <h5>2022</h5>
                    </div>

                    <div class="fe-vehicleSpecs__item">
                        <h3>Make</h3>
                        <h5>
                            <a href="/vehicle-make/jeep">
                                Jeep </a>
                        </h5>
                    </div>

                    <div class="fe-vehicleSpecs__item">
                        <h3>Model</h3>
                        <h5><a href="/vehicle-make/jeep?model=gladiator">
                                Gladiator </a></h5>
                    </div>


                    <div class="fe-vehicleSpecs__item">
                        <h3>Transmission</h3>
                        <h5>Automatic</h5>
                    </div>


                    <div class="fe-vehicleSpecs__item d-md-none">
                        <h3>Carfax</h3>
                        <h5><a href="https://fourbieexchange.com/wp-content/uploads/2024/04/CARFAX-Vehicle-History-Report-for-this-2022-JEEP-GLADIATOR-RUBICON_-1C6JJTBG6NL140905.pdf"
                                target="_blank">
                                View Report
                            </a></h5>
                    </div>

                    <div class="fe-vehicleSpecs__item">
                        <h3>CarFAX</h3>
                        <h5><a href="https://fourbieexchange.com/wp-content/uploads/2024/04/CARFAX-Vehicle-History-Report-for-this-2022-JEEP-GLADIATOR-RUBICON_-1C6JJTBG6NL140905.pdf"
                                target="_blank">
                                View CarFAX Report
                            </a></h5>
                    </div>

                </div>

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
                            <a href="https://www.rogersmotorcars.com/" target="_blank">
                                View on Seller Website
                                <i class="bs bi-box-arrow-up-right"></i>
                            </a>
                        </span>

                        <!-- contact seller button -->
                        <!-- Button to trigger the modal -->
                        <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#contactSellerModal">Contact
                                Seller</button>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
