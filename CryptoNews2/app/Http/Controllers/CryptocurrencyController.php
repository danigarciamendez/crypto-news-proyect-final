<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CryptocurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        //     $parameters = [
        //     'start' => '1',
        //     'limit' => '100'
        //     ];
    
        //     $headers = [
        //     'Accepts: application/json',
        //     'X-CMC_PRO_API_KEY: 082605a1-c449-4636-b389-c66606e85630'
        //     ];
        //     $qs = http_build_query($parameters); // query string encode the parameters
        //     $request = "{$url}?{$qs}"; // create the request URL
    
    
        //     $curl = curl_init(); // Get cURL resource
        //     // Set cURL options
        //     curl_setopt_array($curl, array(
        //     CURLOPT_URL => $request,            // set the request URL
        //     CURLOPT_HTTPHEADER => $headers,     // set the headers 
        //     CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        //     ));
    
        //     $response = curl_exec($curl); // Send the request, save the response
        //     $data = json_decode($response,true); 
        //     $data = $data['data'];
        //     curl_close($curl); // Close request
    
             
        //     for ($i=0; $i < 99 ; $i++) { 
                
        //         Cryptocurrency::updateOrCreate(
        //             [
        //                 'name' => $data[$i]['name'],
                        
        //             ]
        //             ,
        //             [
                    
        //             'name'=> $data[$i]['name'],
        //             'symbol' => $data[$i]['symbol'],
        //             'image' => $data[$i]['name'].'.png',
        //             'price' => $data[$i]['quote']['USD']['price'],
        //             'percent_change_1h' => round($data[$i]['quote']['USD']['percent_change_1h'],2),
        //             'percent_change_24h' => round($data[$i]['quote']['USD']['percent_change_24h'],2),
        //             'percent_change_7d' => round($data[$i]['quote']['USD']['percent_change_7d'],2),
        //             'percent_change_30d' => round($data[$i]['quote']['USD']['percent_change_30d'],2),
        //             'volume_24h' =>round($data[$i]['quote']['USD']['volume_24h'],3),
        //             'market_cap' =>round($data[$i]['quote']['USD']['market_cap'],3),
        //             'date_added' => substr($data[$i]['date_added'],0,10),
        //         ]);
        //     }    
        $cryptos = Cryptocurrency::all();

        return response()->json([
            'data' => $cryptos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  String $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $crypto = Cryptocurrency::where('name', '=', $name)->get();

        return response()->json([
            'data' => $crypto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cryptocurrency $cryptocurrency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cryptocurrency $cryptocurrency)
    {
        //
    }

      /**
     * Display a listing of the cryptocurrencies losers.
     *
     * @return \Illuminate\Http\Response
     */
    public function loser()
    {
        $cryptos = DB::table('cryptocurrencies')->where('name', 'not like', '%USD%')
                        ->orderBy('percent_change_24h','asc')
                        ->limit(5)->get();

        return response()->json([
            'data' => $cryptos
        ]);
    }

      /**
     * Display a listing of the cryptocurrencies winners.
     *
     */
    public function win()
    {
        $cryptos = DB::table('cryptocurrencies')
                    ->where('name','not like','%USD%')
                    ->orderBy('percent_change_24h','desc')
                    ->limit(5)->get();

        return response()->json([
            'data' => $cryptos
        ]);
    }

      /**
     * Search cryptocurrency.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $cryptos = DB::table('cryptocurrencies')->where('name','like',$name.'%')
                    ->get();

        return response()->json([
            'data' => $cryptos
        ]);
    }
}
