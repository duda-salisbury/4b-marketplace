@extends('layouts.admin')

@section('content')
<div class="py-5">
    <div class="container">
        <h1>Inspect Listing</h1>

        @dump($listing)
    </div>
</div>
@endsection