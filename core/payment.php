<?php

class Payment
{

    function __construct()
    {
        require('public/nusoap/nusoap.php');
    }

    function zarinpalRequest($Amount, $Description, $Email, $Mobile)
    {
        $client = new nusoap_client(WebserviceAddress, 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call('PaymentRequest', [
            'MerchantID' => zarinpalMerchantID,
            'Amount' => $Amount,
            'Description' => $Description,
            'Email' => $Email,
            'Mobile' => $Mobile,
            'CallbackURL' => CallbackURL
        ]);
        $Status = $result['Status'];
        $ErrorArray = unserialize(zarinpalErrors);
        $Errors = '';
        $Authority = '';
        if ($Status != 100) {
            $Errors = $ErrorArray[$Status];
        }
        if ($Status == 100) {
            $Authority = $result['Authority'];
        }
        $array = ['Status' => $Status, 'Errors' => $Errors, 'Authority' => $Authority];
        return $array;


    }

    function zarinpalVerify($Amount, $Authority)
    {
        $client = new nusoap_client(WebserviceAddress, 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call('PaymentVerification', [
            'MerchantID' => zarinpalMerchantID,
            'Authority' => $Authority,
            'Amount' => $Amount
        ]);
        $Status = $result['Status'];
        $ErrorsArray = unserialize(zarinpalErrors);
        $Errors = '';
        $RefID = '';
        if ($Status != 100) {
            $Errors = $ErrorsArray[$Status];
        }
        if ($Status == 100) {
            $RefID = $result['RefID'];
        }
        $array = ['Status' => $Status, 'Errors' => $Errors, 'RefID' => $RefID];
        return $array;
    }
}

?>