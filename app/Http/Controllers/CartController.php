<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Inertia\Inertia;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $user = $request->user();
        Cart::create(["user_id" => $user->id, "drug_id" => $id]);
        return to_route('cart.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = $request->user(); // cosi abbiamo l'utente auth

        $cart_rows = Cart::where("user_id", $user->id)->get()->load("drug");

        return Inertia::render("Cart", ["data" => $cart_rows]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return to_route('cart.show')->with('success', 'Prodotto rimosso dal carrello.');
        $userId = auth()->id;
        $cartItems = Cart::where('user_id', $userId)->get();
        $cartCount = $cartItems->count();
        $cartTotal = $cartItems->sum(function ($item) {
            return $item->drug->price;
        });

        return response()->json([
            'success' => true,
            'message' => 'Prodotto rimosso',
            'cartCount' => $cartCount,
            'cartTotal' => number_format($cartTotal, 2),
        ]);
    }

    public function compra_carrello(Request $request)
    {
        $user = $request->user(); // cosi abbiamo l'utente auth

        $cart_rows = Cart::where("user_id", $user->id)->get()->load("drug");

        $stripeController = new PaymentController();

        return $stripeController->pay_cart($cart_rows);
    }
}
