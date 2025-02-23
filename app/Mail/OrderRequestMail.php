<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;
use App\Models\Supplier;

class OrderRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $quantityNeeded;
    public $supplier;

    public function __construct(Product $product, Supplier $supplier, int $quantityNeeded)
    {
        $this->product = $product;
        $this->supplier = $supplier;
        $this->quantityNeeded = $quantityNeeded;
    }

    public function build()
    {
        return $this->subject('Order Request for ' . $this->product->name)
            ->markdown('vendor.mail.order-request');
    }
}
