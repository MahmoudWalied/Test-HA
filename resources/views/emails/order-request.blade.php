@component('mail::message')
    # Order Request Notification

    **Product Name:** {{ $product->name }}
    **Quantity Needed:** {{ $quantityNeeded }}
    **Current Stock:** {{ $product->quantity }}
    **Minimum Required:** {{ $product->minimum_stock }}

    **Supplier Details:**
    {{ $supplier->name }}
    {{ $supplier->email }}
    {{ $supplier->phone }}

    @component('mail::button', ['url' => route('products.show', $product)])
        View Product Details
    @endcomponent

    Please process this order request at your earliest convenience.

    Thank you,
    {{ config('app.name') }}
@endcomponent
