@extends('layouts.app');
@section('title', 'Listings')

@section('content')
    <section class="featured-classifieds mt-4 py-5 bg-dark">
        <div class="container-fluid">

            <livewire:listing-search />

    </section>

@endsection
