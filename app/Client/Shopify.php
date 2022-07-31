<?php

namespace App\Client;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Shopify
{
    public function saveCustomer($dataPayLoad){
        $accessToken = config('shopify.api.access_token');
        $storeUrl = config('shopify.store_url');

        $formattedData = ["customer" => [
            "first_name" => $dataPayLoad['first_name'],
            "last_name" => $dataPayLoad['last_name'],
            "email" => $dataPayLoad['email'],
            "phone" => $dataPayLoad['phone_number'],
            "verified_email" => false,
            "company" => $dataPayLoad['company'],
            "address" => [
                "address1" => $dataPayLoad['street_address'],
                "city" => $dataPayLoad['city'],
                "province" => $dataPayLoad['state'],
                "zip" => $dataPayLoad['zip_code'],
                "last_name" => $dataPayLoad['last_name'],
                "first_name" => $dataPayLoad['first_name'],
                "country" => isset($dataPayLoad['country']) ?? ''
            ]
        ]]; 

        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => $accessToken
        ])->post("https://".$storeUrl."/admin/api/2022-07/customers.json", $formattedData);

        Log::info("Successfully pushed customer to the store.", [$response->json()]);

    }
}