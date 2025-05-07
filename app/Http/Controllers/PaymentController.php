<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class PaymentController extends Controller
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient(env("STRIPE_PRIVATE_KEY"));
    }

    public function pay($product_id)
    {

        $farmaco = Drug::find($product_id); // ci tiriamo giu il farmaco

        $checkout_session = $this->stripe->checkout->sessions->create([
            'line_items' => [[
                # Provide the exact Price ID (e.g. price_1234) of the product you want to sell
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        "name" =>$farmaco->name
                    ],
                    "unit_amount" =>$farmaco->price*100
                ],
                'quantity' => 1,
            ]],
            "metadata"=>$farmaco->toArray(),
            'mode' => 'payment',
            'success_url' => 'http://localhost:8000/drugs',
            'cancel_url' =>  'http://localhost:8000/drugs',
        ]);
        return redirect()->away($checkout_session->url);
    }
}
