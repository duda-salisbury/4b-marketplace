@extends('layouts.app');

@section('title', 'Create Listing')

@section('content')
<div class="container mt-5">
    <h1>Create Listing</h1>

    <!-- photo uploads -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
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
    </div>

    <!-- listing details -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
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

                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="text" name="year" id="year" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="make" class="form-label">Make</label>
                            <select name="make" id="make" class="form-control">
                                <option value="Toyota">Toyota</option>
                                <option value="Honda">Honda</option>
                                <option value="Ford">Ford</option>
                                <option value="Chevrolet">Chevrolet</option>
                                <option value="Nissan">Nissan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <select name="model" id="model" class="form-control">
                                <option value="Corolla">Corolla</option>
                                <option value="Civic">Civic</option>
                                <option value="F-150">F-150</option>
                                <option value="Silverado">Silverado</option>
                                <option value="Altima">Altima</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" id="location" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="seller" class="form-label">Seller</label>
                            <select name="seller" id="seller_name" class="form-control">
                                <option value="1">ABC Motors</option>
                                <option value="2">XYZ Autos</option>
                                <option value="3">123 Cars</option>
                            </select>
                        </div>

                        <!-- odometer -->
                        <div class="mb-3">
                            <label for="odometer" class="form-label">Odometer</label>
                            <input type="text" name="odometer" id="odometer" class="form-control">
                        </div>


                        <button type="submit" class="btn btn-primary">Create Listing</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    


@endsection