<?php

namespace App\Services;

class MpesaService {
    public function getAccessToken() {
        $consumerKey = env('MPESA_CONSUMER_KEY');
        $consumerSecret = env('MPESA_CONSUMER_SECRET');
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode($consumerKey.':'.$consumerSecret);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials));
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($result);
        $access_token = $result->access_token;
        curl_close($curl);

        return $access_token;
    }

    public function sendSTKPush($access_token, $data) {
        $mpesa= new \Safaricom\Mpesa\Mpesa();
    
        $BusinessShortCode = $data['BusinessShortCode'];
        $LipaNaMpesaPasskey = $data['LipaNaMpesaPasskey'];
        $TransactionType = $data['TransactionType'];
        $Amount = $data['Amount'];
        $PartyA = $data['PartyA'];
        $PartyB = $data['PartyB'];
        $phoneNumber = $data['PhoneNumber'];
        $CallBackURL = $data['CallBackURL'];
        $AccountReference = $data['AccountReference'];
        $TransactionDesc = $data['TransactionDesc'];
        $Remarks = $data['Remarks'];
    
        return $mpesa->STKPushSimulation(
            $BusinessShortCode, 
            $LipaNaMpesaPasskey, 
            $TransactionType, 
            $Amount, 
            $PartyA, 
            $PartyB, 
            $phoneNumber, 
            $CallBackURL, 
            $AccountReference, 
            $TransactionDesc, 
            $Remarks,
            $access_token
        );
    }  
}
?>