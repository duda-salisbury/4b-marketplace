@extends('layouts.app');

@section('title', 'Create Listing')

@section('content')
    <div class="container mt-5 pt-4">
        <h1>Create Listing</h1>

        <!-- photo uploads -->
        <div class="row">
            <div class="col-md-6 my-4">

                <!-- card for listing type, two buttons (standard, premium) -->
                <div class="card mb-4 bg-white">
                    <div class="card-header">
                        Listing Type
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="btn-group flex-grow-1" role="group" aria-label="Listing Type">
                                <button type="submit" class="btn btn-outline-primary">Standard</button>
                                <button type="submit" class="btn btn-outline-success">Premium</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-white">
                    <div class="card-header">
                        Details
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>

                            <!-- make, model, year -->
                            <div class="d-flex">
                                <div class="flex-grow-1 mb-3 me-2">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="text" name="year" id="year" class="form-control">
                                </div>

                                <div class="flex-grow-1 mb-3 me-2">
                                    <label for="make" class="form-label">Make</label>
                                    <select name="make" id="make" class="form-control">
                                        <option value="Toyota">Toyota</option>
                                        <option value="Honda">Honda</option>
                                        <option value="Ford">Ford</option>
                                        <option value="Chevrolet">Chevrolet</option>
                                        <option value="Nissan">Nissan</option>
                                    </select>
                                </div>

                                <div class="flex-grow-1 mb-3">
                                    <label for="model" class="form-label">Model</label>
                                    <select name="model" id="model" class="form-control">
                                        <option value="Corolla">Corolla</option>
                                        <option value="Civic">Civic</option>
                                        <option value="F-150">F-150</option>
                                        <option value="Silverado">Silverado</option>
                                        <option value="Altima">Altima</option>
                                    </select>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows='12' class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" name="price" id="price" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" id="location" class="form-control">
                            </div>

                            <!-- odometer -->
                            <div class="mb-3">
                                <label for="odometer" class="form-label">Odometer</label>
                                <input type="text" name="odometer" id="odometer" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-white">
                    <div class="card-header">
                        Photos
                    </div>
                    <div class="card-body">
                        <p>The first photo will be the main photo for the listing.</p>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="photos[]" multiple>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
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
                        </div>
                    </div>
                </div>

                <!-- card for seller info (name (dropdown), email, phone) -->
                <div class="card mt-4 bg-white">
                    <div class="card-header">
                        Seller Info
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <select name="name" id="name" class="form-control">
                                    <option value="John Doe">John Doe</option>
                                    <option value="Jane Doe">Jane Doe</option>
                                    <option value="John Smith">John Smith</option>
                                    <option value="Jane Smith">Jane Smith</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>
                        </form>
                    </div>

                </div>

                <!-- card for submit button / cancel button -->
                <div class="mt-4 d-flex">
                    <button type="submit" class="btn btn-lg btn-success flex-grow-1">Save Listing</button>

                </div>
            </div>
        </div>
    </div>




@endsection
