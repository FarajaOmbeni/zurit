<?php
namespace App\Http\Controllers;

use App\Models\Mpesa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function __construct(){
        $this->consumer_key = env('MPESA_CONSUMER_KEY');
        $this->consumer_secret = env('MPESA_CONSUMER_SECRET');
        $this->passkey = env('MPESA_PASSKEY');
        $this->CallBackURL = env('MPESA_CALL_BACK_URL');
        $this->env = env('MPESA_ENV');
        $this->initiatorName = env('MPESA_INITIATOR_NAME');
        $this->initiatorPassword = env('MPESA_INITIATOR_PASSWORD');
    }
    
    //Initiate STK Push
    public function stkPushRequest(Request $request){

        $accountReference = 'Transaction#'.Str::random(10);

        $amount = $request->bookPrice;
        $phone = $this->formatPhone($request->phone);
        $bookName = $request->bookName;

        $mpesa = new Mpesa();
        $stk = $mpesa->lipaNaMpesa($amount, $phone, $accountReference);
        $invalid = json_decode($stk);

        if (@$invalid->errorCode) {
            Session::flash('mpesa-error', 'Invalid phone number!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
        $callbackUrl = env('MPESA_CALL_BACK_URL');

        //return redirect('/confirm/'.encrypt($accountReference));
        return redirect()->away($callbackUrl);
    }

    public function checkTransactionStatus($transactionCode){

        $mpesa = new Mpesa();
        $status = $mpesa->status($transactionCode);

        $tStatus = $status->{'ResponseCode'};

        return $tStatus;
    }

    public function formatPhone($phone)
    {
        $phone = preg_replace('/^0/', '254', $phone);
        return $phone;
    }

    public function callback(Request $request) {
        // Get the transaction result from the request
        $result = json_decode($request->getContent());
    
        // Check if the transaction was successful
        if ($result->Body->stkCallback->ResultCode == 0) {
            // Return the transaction result as a JSON response
            return response()->json([
                'ResultCode' => 0,
                'ResultDesc' => 'Accepted',
                'MerchantRequestID' => $result->Body->stkCallback->MerchantRequestID,
                'CheckoutRequestID' => $result->Body->stkCallback->CheckoutRequestID,
                'TransactionResult' => $result->Body->stkCallback->ResultDesc,
            ]);
        } else {
            // Return the failure as a JSON response
            return response()->json([
                'ResultCode' => 1,
                'ResultDesc' => 'Failed',
                'MerchantRequestID' => $result->Body->stkCallback->MerchantRequestID,
                'CheckoutRequestID' => $result->Body->stkCallback->CheckoutRequestID,
                'TransactionResult' => $result->Body->stkCallback->ResultDesc,
            ]);
        }
    }
}
?>