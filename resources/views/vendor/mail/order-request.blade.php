@component('mail::layout')
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    # Order Request Notification

    **Product:** {{ $product->name }}
    **Quantity Needed:** {{ $quantityNeeded }}
    **Current Stock:** {{ $product->quantity }}
    **Minimum Required:** {{ $product->minimum_stock }}

    **Supplier:** {{ $supplier->name }}
    **Email:** {{ $supplier->email }}
    **Phone:** {{ $supplier->phone }}

    @component('mail::button', ['url' => route('products.show', $product)])
        View Product Details
    @endcomponent

    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
