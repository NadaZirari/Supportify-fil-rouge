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
        
        return view('payment.success');
    }

}
