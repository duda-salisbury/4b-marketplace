@extends('layouts.app')

@section('title', 'Premium Listing')

@section('content')
<main class="featured-listing">
    <div class="container-fluid mt-5 pt-3">
        <div style="background-image: url(https://fourbieexchange.com/wp-content/uploads/2024/02/1994-mitsubishi-delica-van-4x4-stinger-for-sale-01.jpg);"
            class="featured-hero row img-hero d-none d-md-flex pt-3 d-flex align-items-center ">
            <!-- jumbotron with single image background -->
            <div class="container featured-hero__content">
                <span class="badge bg-fe-orange">Featured Listing</span>
                <h1 class="display-4 text-white">1945 Willys Jeep CJ-2A</h1>
                <p class="lead text-white">
                    <span class="badge bg-success fe-price">$19,000</span>
                    Rogers Motorcars
                    <i class="bi bi-geo-alt-fill"></i> Houston, TX
                </p>
            </div>
        </div>
    </div>
    <!-- on-page navigation -->
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-10 fe-VehicleDescription">
                <div class="fe-vehicleSpecs d-none d-md-flex mb-3">
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
                <div class="mb-4">
                    <h2>Description</h2>
                    <p>We are excited to offer this RARE 1st year 1945 Willys Jeep CJ-2A.

                        This Jeep is the first civilian version built but it has been made to look like the military
                        version. This jeep is a blast to drive and gets tons of attention and runs great. In preparation
                        for sale this CJ-2A got new tires, new battery, new carburetor, rebuilt gas tank, new gas lines,
                        new brake lines, new starter, rebuilt transmission, new fuel pump, new rotor, plugs and points.
                        This Willys Jeep is easy to start and we’ve reached 50mph on GPS. Seat Belts have been added for
                        safety. The oil pressure gauge works, the wipers work, the temp gauge works, the headlights work
                        and the black out light on the driver fender works. This Willys CJ-2A would be great for getting
                        around the neighborhood, running errands, running around the ranch, parades or used at the lake
                        house or beach! We can ship anywhere in the US and offer Airport Pickup. Third Party Inspections
                        always welcome. Call, TEXT or Email anytime!
                    </p>
                </div>

                <div class="mb-4">
                    <h2>Features</h2>
                    <ul>
                        <li>4x4</li>
                        <li>Manual Transmission</li>
                        <li>4 Cylinder Engine</li>
                        <li>Soft Top</li>
                        <li>Runs Great</li>
                    </ul>
                </div>

                <div class="mb-4">
                    <h2>Vehicle History</h2>
                    <p>This vehicle has no reported accidents or damage.</p>
                </div>

                <div class="mb-4">
                    <h2>Price Comparison</h2>
                    <iframe loading="lazy" style="border: 0;" src="https://www.classic.com/widget/K9KoQs2vx3uv4z/"
                        width="100%" height="450"></iframe>
                </div>

                <h2 class="mt-4 text-white">Videos</h2>
                <div id="videoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="ratio ratio-16x9">
                                <iframe src="//www.youtube.com/embed/Tlz2X9nMbUA" title="YouTube video player"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#videoCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#videoCarousel"
                        data-bs-slide="next">
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
                        <button class="btn btn-success" data-toggle="modal" data-target="#contactSellerModal">Contact
                            Seller</button>
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
</main>
@endsection
