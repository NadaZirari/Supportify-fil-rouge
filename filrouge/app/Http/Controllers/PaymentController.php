<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function cancel()
    {
        return view('payment.cancel');
    }

    
}
