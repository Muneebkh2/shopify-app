<?php

namespace App\Http\Controllers;

// use App\Client\Shopify;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Http;
use Signifly\Shopify\Shopify;

class CustomersController extends Controller
{
    // private $shopifyClient;

    // public function __construct(Shopify $shopifyClient){
    //     $this->shopifyClient = $shopifyClient;
    // }

    
    public function appDashboard() {
        $allCustomers = Customers::all()->sortByDesc("created_at");
        return view('welcome', compact('allCustomers'));
    }
    
    public function addShopifyCustomer(){
        Log::info("here...");
        $shopify = new Shopify(
            env('SHOPIFY_API_KEY'),
            env('SHOPIFY_PASSWORD'),
            env('SHOPIFY_DOMAIN'),
            env('SHOPIFY_API_VERSION')
        );
        dd($shopify->get('customer.json'));
        dd($shopify->getProductsCount());
        
        // dd("yes here...");
        // dd(Http::get('c4a9f8950a14ecbf3ef0e5b6960c459f:ca680dde6f22e45d827b0f0dbf7a12fa@new-custom-app-test.myshopify.com/admin/api/2022-07/customers.json'));
        // dd(Shopify::rest()->get('products'));
        return response()->json('asd');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customers::all()->sortByDesc("created_at");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('from store method..');
        Log::info('Request Array:', $request->all());

        $rawRequestData = json_decode($request->get('rawRequest'), true);
        Log::debug('rawRequestData Array:', [$rawRequestData]);
        
        $dataPayLoad = [
            "first_name" => $rawRequestData['q3_name']['first'],
            "last_name" => $rawRequestData['q3_name']['last'],
            "company" => $rawRequestData['q5_company'],
            "email" => $rawRequestData['q4_email'],
            "phone_number" => $rawRequestData['q7_phoneNumber']['full'],
            "street_address" => $rawRequestData['q8_address']['addr_line1'],
            "street_address_2" => $rawRequestData['q8_address']['addr_line2'],
            "city" => $rawRequestData['q8_address']['city'],
            "state" => $rawRequestData['q8_address']['state'],
            "zip_code" => $rawRequestData['q8_address']['postal']
        ];
        Log::debug('DataPayLoad: Array:', [$dataPayLoad]);

        // dd($dataPayLoad);
        Customers::create($dataPayLoad);

        // $this->shopifyClient->saveCustomer($dataPayLoad);
        return Redirect::route('shopify-customer-create')->with('data', $dataPayLoad);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers)
    {
        //
    }
}
