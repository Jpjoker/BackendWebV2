<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function services()
    {
        return view('home.services');
    }
    public function checkout()
    {
        \Stripe\Stripe::setApiKey(config('sk_test_51OYvMTBBCo6N0kt1EGtLLIQu5Zi9THizRccXTvrlUfTG5bgoWW9wqt9xLJQFLwUx04YxkWV1HihmkaANBn4LARjY00Rm3chX1P'));
        
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => 'usd',
                'unit_amount' => 2000,
                'product_data' => [
                  'name' => 'Stubborn Attachments',
                  'images' => ["https://i.imgur.com/EHyR2nP.png"],
                ],
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('/success'),
            'cancel_url' => url('/cancel'),
          ]);
          return view('checkout', ['session' => $session
        ]);
           
        // Remove the following code block
        /*
        return redirect()->away($session->url);
        */
    }
    public function success()
    {
        return view('success');
    }
}
