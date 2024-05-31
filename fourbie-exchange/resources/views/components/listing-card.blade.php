<div class="vert-card card h-100">
    <img src="{{ asset('img/8.jpg') }}" class="card-img-top" alt="Vehicle Image">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center px-2">
            <span class="badge bg-success">${{ Number::format($listing->price) }}</span>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title">
            <a href="listings/{{ $listing->id }}">
                {{ $listing->title }}
            </a>
        </h5>
        <p class="card-text">{{ $listing->excerpt }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <span class="material-symbols-outlined">
                account_circle
            </span>
            @if ( $listing->dealer )
                {{ $listing->dealer->name }}
            @else
                Private Seller
            @endif
        </li>
    </ul>


    <div class="card-footer">
        <span class="material-symbols-outlined">
            location_on
        </span>
        {{ $listing->city }}, {{ $listing->state }}
    </div>
</div>