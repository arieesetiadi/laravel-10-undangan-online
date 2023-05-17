<?php

namespace App\Http\Controllers\WEB\Integrations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        dd($request->all());
    }
}
