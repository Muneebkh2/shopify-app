<?php

namespace App\Client;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
// use Shopify\Rest\Admin2022_07\Customer;
// use Shopify\Utils;

class Shopify {
    public function saveCustomer($customerData) {

        $shop = Auth::user();

        $themes = $shop->api()->rest('GET', '/admin/themes.json');

        // get active theme id
        $activeThemeId = "";
        foreach($themes['body']->container['themes'] as $theme){
            if($theme['role'] == "main"){
                $activeThemeId = $theme['id'];
                dd($activeThemeId);
            }
        }

        $snippet = "Your snippet code updated";

        // Data to pass to our rest api request
        $array = array('asset' => array('key' => 'snippets/codeinspire-wishlist-app.liquid', 'value' => $snippet));

        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array);

        // save data into database

        Setting::updateOrCreate(
            ['shop_id' => $shop->name ],
            ['activated' => true]
        );

        return ['message' => 'Theme setup succesfully'];
        
        // $shop = Auth::user();
        // $domain = $shop->getDomain()->toNative();
        // $shopApi = $shop->api()->rest('GET', '/admin/shop.json')['body']['shop'];

        // Log::info("Shop {$domain}'s object:" . json_encode($shop));
        // Log::info("Shop {$domain}'s API objct:" . json_encode($shopApi));
        // return;
        
        // $this->test_session = Utils::loadCurrentSession(
        //     $requestHeaders,
        //     $requestCookies,
        //     $isOnline
        // );
        // $customer = new Customer($this->test_session);
        // $customer->first_name = "Steve";
        // $customer->last_name = "Lastnameson";
        // $customer->email = "steve.lastnameson@example.com";
        // $customer->phone = "+15142546011";
        // $customer->verified_email = true;
        // $customer->addresses = [
        //     [
        //         "address1" => "123 Oak St",
        //         "city" => "Ottawa",
        //         "province" => "ON",
        //         "phone" => "555-1212",
        //         "zip" => "123 ABC",
        //         "last_name" => "Lastnameson",
        //         "first_name" => "Mother",
        //         "country" => "CA"
        //     ]
        // ];
        // return $customer->save(
        //     true, // Update Object
        // );
    }
}

?>