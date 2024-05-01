@extends('layouts.app')
@section('title', 'Listing Media')

@section('content')

    {{-- listing media: tabbed interface for photos, videos --}}

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

                    <h3 class="text-uppercase mb-0 me-3">1945 Willys Jeep CJ-2A</h3>
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


        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <!-- back to listing -->
                    <li class="nav-item">
                        <a class="nav-link" href="/listings/show">
                            <!-- left arrow bootstrap icon -->
                            Vehicle Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#photos" data-bs-toggle="tab">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#videos" data-bs-toggle="tab">Videos</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="photos">
                        <div class="row mt-3">
                            <div class="col-md-4 mb-3">
                                <img class="d-block w-100" src="https://fourbieexchange.com/wp-content/uploads/2024/04/1945-willys-jeep-cj-2a-5.jpg"
                                    alt="Placeholder Image 1">
                            </div>
                            <div class="col-md-4 mb-3">
                                <img class="d-block w-100" src="https://fourbieexchange.com/wp-content/uploads/2024/04/1945-willys-jeep-cj-2a-1.jpg"
                                    alt="Placeholder Image 2">
                            </div>
                            <div class="col-md-4 mb-3">
                                <img class="d-block w-100" src="https://fourbieexchange.com/wp-content/uploads/2024/04/1945-willys-jeep-cj-2a.jpg"
                                    alt="Placeholder Image 3">
                            </div>
                            <!-- Repeat for other images -->
                            <div class="col-md-4 mb-3">
                                <img class="d-block w-100" src="https://via.placeholder.com/400x300"
                                    alt="Placeholder Image 4">
                            </div>

                            <div class="col-md-4 mb-3">
                                <img class="d-block w-100" src="https://via.placeholder.com/400x300"
                                    alt="Placeholder Image 5">
                            </div>

                            <div class="col-md-4 mb-3">
                                <img class="d-block w-100" src="https://via.placeholder.com/400x300"
                                    alt="Placeholder Image 6">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="videos">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="embed-responsive-item"
                                                src="https://www.youtube.com/embed/7lCn8tJjX9M" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
