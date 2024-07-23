@extends('layouts.app')
@section('title', 'Premium Listing - Sell Your 4x4, Pickup Truck, or Overland Vehicle')

@section('content')
    <x-hero 
    classname="fe-hero--sell text-white" 
    title="Sell your 4x4, pickup truck, or overland vehicle."
    blurb="Reach our massive community of off-road and overland enthusiasts with fast, hassle-free, 
    and low-cost sales solutions for private party sellers and dealers."
    :cta1="[
    'classname'=>'btn-outline-white text-white btn-lg', 
    'url' => '/sell/standard', 
    'label' => 'Learn More']" />

    <div class="container pt-4">

        <div class="row py-2">
            <div class="col">
                <h2 class="text-white">fast & easy ways to sell your way:
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        STANDARD LISTINGS
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Live within 24hrs.</li>
                            <li>Dedicated vehicle details page</li>
                            <li>Up to 50 images & video</li>
                            <li>Leads delivered to your email</li>
                            <li>$15 per 30-day listing</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('sell.standard') }}" class="btn btn-primary">Get Started With a Standard
                            Listing</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        PREMIUM LISTINGS
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Live within 48hrs.</li>
                            <li>Premium, full-length listing</li>
                            <li>CARFAX report included</li>
                            <li>No tire-kickers or lowball offers</li>
                            <li>One-time $149 fee</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('sell.premium') }}" class="btn btn-primary">Get Started With a Premium Listing</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
