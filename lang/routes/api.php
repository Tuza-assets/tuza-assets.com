<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Zonning;
use App\Models\PropertyOnSell;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->name('v1')->group(function (){
    
    route::get('/zonning', function (){
        $Zonnings = Zonning::all();
        return response()->json(['data'=>$Zonnings, 'table'=>'zonnings',  'message'=>'zonning data'],200);

    });
    
    
        route::get('/zonning/{id}', function ($id){
        $zoning = Zonning::firstWhere('id',$id);
        if (!$zoning) {
            return response()->json(['data'=>[], 'table'=>'zonnings', 'message'=>'zonning data not found'], 404);
        }
        return response()->json(['data'=>$zoning, 'table'=>'zonnings', 'message'=>'zonning data'],200);
    });
    

  Route::get('/properties', function () {
        $properties = PropertyOnSell::with('zoning')->get();
        return response()->json(['data' => $properties], 200);
    });



}); 

