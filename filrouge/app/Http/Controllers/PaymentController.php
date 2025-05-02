<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function showPaymentPage()
    {
        return view('payment.premium');
    }

    public function paymentCancel()
    {
        return view('payment.cancel');
    }
    public function paymentSuccess(Request $request)
    {
        $user = Auth::user();
        $user->is_premium = true;
        $user->save();
        
        return redirect()->route('user.Soumettre_ticket')->with('premium_success', 'Félicitations ! Vous êtes maintenant un utilisateur Premium et pouvez créer un nombre illimité de tickets.');    }

    public function processPayment()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Supportify Premium',
                    ],
                    'unit_amount' => 2999,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
        ]);
        
        return redirect($session->url);
    }

}
