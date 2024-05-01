@extends('layouts.app');
@section('title', 'All Sellers')

@section('content')
<!-- list all sellers (model name is Dealer) -->

<div class="container mt-5 pt-3">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">All Sellers</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Zip</th>
                        <th scope="col">Country</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sellers as $seller)
                    <tr>
                        <th scope="row">{{$seller->id}}</th>
                        <td>{{$seller->name}}</td>
                        <td>{{$seller->email}}</td>
                        <td>{{$seller->phone}}</td>
                        <td>{{$seller->address}}</td>
                        <td>{{$seller->city}}</td>
                        <td>{{$seller->state}}</td>
                        <td>{{$seller->zip}}</td>
                        <td>{{$seller->country}}</td>
                        <td>
                            <a href="#" class="btn btn-primary">View</a>
                            <a href="#" class="btn btn-warning">Edit</a>
                            <form action="#" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>