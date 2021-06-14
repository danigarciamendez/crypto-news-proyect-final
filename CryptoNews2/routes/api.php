<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Models\Cryptocurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


    Route::get('/cryptocurrencies', function () {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
            $parameters = [
            'start' => '1',
            'limit' => '100'
            ];
    
            $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: 082605a1-c449-4636-b389-c66606e85630'
            ];
            $qs = http_build_query($parameters); // query string encode the parameters
            $request = "{$url}?{$qs}"; // create the request URL
    
    
            $curl = curl_init(); // Get cURL resource
            // Set cURL options
            curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers 
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
            ));
    
            $response = curl_exec($curl); // Send the request, save the response
            $data = json_decode($response,true); 
            $data = $data['data'];
            curl_close($curl); // Close request
    
             
            for ($i=0; $i < 99 ; $i++) { 
                
                Cryptocurrency::updateOrCreate(
                    [
                        'name' => $data[$i]['name'],
                        
                    ]
                    ,
                    [
                    
                    'name'=> $data[$i]['name'],
                    'symbol' => $data[$i]['symbol'],
                    'image' => $data[$i]['name'].'.png',
                    'price' => $data[$i]['quote']['USD']['price'],
                    'percent_change_1h' => round($data[$i]['quote']['USD']['percent_change_1h'],2),
                    'percent_change_24h' => round($data[$i]['quote']['USD']['percent_change_24h'],2),
                    'percent_change_7d' => round($data[$i]['quote']['USD']['percent_change_7d'],2),
                    'percent_change_30d' => round($data[$i]['quote']['USD']['percent_change_30d'],2),
                    'volume_24h' =>round($data[$i]['quote']['USD']['volume_24h'],3),
                    'market_cap' =>round($data[$i]['quote']['USD']['market_cap'],3),
                    'date_added' => substr($data[$i]['date_added'],0,10),
                ]);
            }
            $cryptos = Cryptocurrency::all();
            return response()->json([
                'data' => $cryptos
            ]);
    });

    

    
    Route::post('/auth/login', [AuthController::class, 'login']);
    
        
        Route::post('register', [UserController::class,'register']);
        Route::get('auth/signin',[UserController::class,'authenticate']);


        Route::post('/auth/register', [AuthController::class, 'register']);

        
    
        Route::post('/auth/logout', [AuthController::class, 'logout']);
           
        Route::group([
            'middleware' => 'api',
            'prefix' => 'auth'
            ], function() {
        
            Route::get('/refresh',[AuthController::class, 'refresh']);
            
            Route::get('/cryptocurrencies/all', [CryptocurrencyController::class, 'index']);
    
            Route::get('/cryptocurrencies/win', [CryptocurrencyController::class, 'win']);
    
            Route::get('/cryptocurrencies/loser',[CryptocurrencyController::class,'loser']);
    
            Route::get('/cryptocurrencies/{name}',[CryptocurrencyController::class,'show']);
    
            Route::get('/cryptocurrencies/search/{name}',[CryptocurrencyController::class,'search']);
    
            Route::get('/new', [NewsController::class, 'index']);
    
            Route::get('/new/find/{id}', [NewsController::class, 'show']);
    
            Route::get('/cryptocurrencies/find/new/{id}', [NewsController::class, 'find']);
    
            Route::get('/new/modify/{id}', [NewsController::class, 'findNew']);
    
            Route::post('/new/modify/{id}', [NewsController::class, 'update']);
    
            Route::post('/new/delete/{id}', [NewsController::class, 'destroy']);
    
            Route::get('/new/last', [NewsController::class, 'last']);
    
            Route::get('/users/all', [UserController::class, 'index']);
    
            // Route::get('auth/signin', [AuthController::class, 'login']);
    
            Route::post('message/add', [MessageController::class, 'store']);
        });
        
        
    
