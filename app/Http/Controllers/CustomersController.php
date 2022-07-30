<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        // return;
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