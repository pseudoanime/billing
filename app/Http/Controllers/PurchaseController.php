<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Customer;
use Stripe\Charge;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Stripe::setApiKey(env("STRIPE_SECRET"));

        return view('payments.index',[
            'amount' => 2500,
            'description' => "Buy my book"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = Customer::create([
            'email'   => $request->stripeEmail,
            'source'  => $request->stripeToken
        ]);

        $charge = Charge::create([
            'customer' => $customer->id,
            'amount'   => 2500,
            'currency' => 'usd'
        ]);

        return "All done";

    }
}
