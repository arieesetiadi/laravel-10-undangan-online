<?php

namespace App\Http\Controllers\API\V1\Payment;

use App\Constants\PaymentGateway;
use App\Http\Controllers\API\ResponseController;
use App\Http\Controllers\Controller;
use App\Integrations\Doku;
use Exception;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * API for making payment base on payment gateway.
     *
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $dokuName = PaymentGateway::DOKU;
            $gateway = $request->gateway ?? $dokuName;

            switch ($gateway) {
                case $dokuName:
                    $doku = new Doku();
                    $checkout = $doku->checkout([]);
                    $data = [
                        'checkout' => $checkout,
                    ];

                    return ResponseController::success('PAYMENT_CHECKOUT_GENERATED', $data);
                    //
                default:
                    throw new Exception('PAYMENT_GATEWAY_INVALID');
            }
        }
        //
        catch (\Throwable $error) {
            $message = $error->getMessage();
            $data = $error->getTrace();
            $code = $error->getCode();

            return ResponseController::failed($message, $data, $code);
        }
    }

    /**
     * API for retrieving callback base on payment gateway.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback(Request $request)
    {
        try {
            $dokuSlug = PaymentGateway::slug(PaymentGateway::DOKU);
            $gateway = $request->gateway ?? $dokuSlug;

            switch ($gateway) {
                case $dokuSlug:
                    $doku = new Doku();
                    $response = $doku->notification($request);

                    return ResponseController::success('PAYMENT_CALLBACK_SUCCESS', $response);
                    //
                default:
                    throw new Exception('PAYMENT_GATEWAY_INVALID');
            }
        }
        //
        catch (\Throwable $error) {
            $message = $error->getMessage();
            $data = $error->getTrace();
            $code = $error->getCode();

            return ResponseController::failed($message, $data, $code);
        }
    }
}
