<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Preorder;
use App\Product;
use App\PreorderProduct;

class AlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $preorder;
    public $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($preorder)
    {
        //dd($preorder);
        $this->preorder = $preorder;

        $this->products = Product::all();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->preorder);
        return $this->subject('Nouvelle commande Kutì Kutì')
                    ->view('mail.alert');
    }
}
