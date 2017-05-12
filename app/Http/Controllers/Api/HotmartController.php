<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;

class HotmartController extends Controller
{

  public function access(Request $request, Sale $sale){
    $data =  $request->all();
    return $sale->newSale($data);
  }

}
