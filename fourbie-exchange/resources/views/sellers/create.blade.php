@extends('layouts.app');
@section('title', 'Add a Seller')

@section('content')

    <div class="bg-dark pb-5">

        <div class="container mt-5 pt-3">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-white">Add a Seller</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Contact Information
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>

                                <!-- website -->

                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" name="website" id="website" class="form-control">
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            Address Information
                        </div>
                        <div class="card-body">
                            <div class="form-row mb-4">

                                <div class="form-group mb-2">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control">
                                </div>

                                <div class="form-group mb-2 d-flex">
                                    <div class="me-2">
                                        <label for="city">City</label>
                                        <input type="text" name="city" id="city" class="form-control">
                                    </div>

                                    <div class="me-2">
                                        <label for="state">State</label>
                                        <input type="text" name="state" id="state" class="form-control">
                                    </div>

                                    <div>
                                        <label for="zip">Zip</label>
                                        <input type="text" name="zip" id="zip" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            About the Seller
                        </div>
                        <div class="card-body">
                            <!-- user name affiliation, drop down or auto complete -->
                            <div class="form-group mb-2">
                                <label for="user">Associated User (if applicable)</label>
                                <select name="user" id="user" class="form-select">
                                    <option value="1">John Doe</option>
                                    <option value="2">Jane Doe</option>
                                    <option value="3">John Smith</option>
                                </select>
                            </div>
                                

                            <!-- private party or dealer selection -->
                            <div class="form-group mb-2" mt-3>
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-select">
                                    <option value="dealer">Dealer</option>
                                    <option value="private">Private Party</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                            </div>
                            <!-- logo upload -->
                            <div class="form-group mt-3">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- syndication info -->
                    <div class="card mt-3">
                        <div class="card-header">
                            Syndication Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="syndication">Syndication Source</label>
                                <input type="text" name="syndication" id="syndication" class="form-control">
                            </div>

                            <div class="form-group" mt-3>
                                <label for="syndication_id">Syndication ID</label>
                                <input type="text" name="syndication_id" id="syndication_id" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="row mt-3">
                <div class="col-md-12">
                    <button class="btn btn-success">Save Seller</button>
                </div>
            </div>

        </div>
    </div>

@endsection
