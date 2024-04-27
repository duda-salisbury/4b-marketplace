@extends('layouts.admin')

@section('content')
<div class="py-5">
    <div class="container">
        <h1>Listings</h1>
        
        <div class="row">
            <div class="col">
                {{ $listings->links() }}
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listings as $listing)
                    <tr>
                        <td>{{ $listing->id }}</td>
                        <td>{{ $listing->title }}</td>
                        <td><span @class(['badge', 'text-bg-warning' => $listing->status === 'draft', 'text-bg-success' => $listing->status === 'publish'])>{{ Str::ucfirst($listing->status) }}</span></td>
                        <td>${{ Number::format($listing->price) }}</td>
                        <td>{{ $listing->created_at->format('m/d/Y') }}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col">
                {{ $listings->links() }}
            </div>
        </div>
    </div>
</div>
@endsection