<?php

return [
    'store_url' => env('SHOPIFY_APP_HOST_NAME'),
    'api'       => [
        'version' => env('SHOPIFY_API_VERSION', '2022-07'),
        'key'     => env('SHOPIFY_API_KEY'),
        'token'   => env('SHOPIFY_API_SECRET')
    ],
];