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
                        "name" => $farmaco->name
                    ],
                    "unit_amount" => $farmaco->price * 100
                ],
                'quantity' => 1,
            ]],
            "metadata" => $farmaco->toArray(),
            'mode' => 'payment',
            'success_url' => 'http://localhost:8000/drugs',
            'cancel_url' =>  'http://localhost:8000/drugs',
        ]);
        return redirect()->away($checkout_session->url);
    }

    public function pay_cart($items)
    {
        $line_items = array();

        foreach ($items->toArray() as $cart_row) {
            array_push(
                $line_items,
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            "name" => $cart_row["drug"]["name"]
                        ],
                        "unit_amount" => $cart_row["drug"]["price"] * 100
                    ],
                    'quantity' => 1,
                ]
            );
        }
        //end foreach

        $checkout_session = $this->stripe->checkout->sessions->create([
            'line_items' => $line_items,
            /* "metadata" => $farmaco->toArray(), */
            'mode' => 'payment',
            'success_url' => 'http://localhost:8000/drugs',
            'cancel_url' =>  'http://localhost:8000/drugs',
        ]);
        return redirect()->away($checkout_session->url);
    }
}
