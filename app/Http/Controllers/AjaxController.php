<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;

class AjaxController extends Controller
{
    public function getSellPriceDescItem($id)
    {
        $query = DB::table('items')->select('selling_price', 'quantity')->where('id', $id)->first();

        // echo $query;
          $data['data'] = $query;

        // echo json_encode($query);
        //return view('items.items-order', ['items' => $query]);
         return response()->json(['data' => $query]);
        // exit;

    }
}
