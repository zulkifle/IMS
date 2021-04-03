<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Transaction;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * To show the list item view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ListofItems = DB::table('items')->latest()->paginate(7);
        return view('items.items-list', ['ListofItems' => $ListofItems]);
        // return view('/items/items-list');
    }

    /**
     * To show add item view
     */
    public function addItemView()
    {
        return view('items.items-add');
    }


    /**
     * To store data to DB
     */
    public function storeItemToDB(Request $request)
    {
        $item = new Item();
        $item->name = $request->ItemName;
        $item->brand = $request->Brand;
        $item->model = $request->Model;
        $item->color = $request->Color;
        $item->quantity = $request->Quantity;
        $item->minimum_item = $request->Minimum;
        $item->cost_price = $request->CostPrice;
        $item->selling_price = $request->SellPrice;
        $item->Description = $request->Description;

        $item->save();
        
        return redirect()->route('list_item');

    }


    /**
     * To delete data on DB
     */
    public function deleteItemFromList($id)
    {
        DB::table('items')->where('id', $id)->delete();
        return redirect()->back();
    }


    /**
     * To show edit view
     */
    public function editItemFromList($id)
    {
        $item = DB::table('items')->where('id', $id)->first();
        return view('items.items-edit',["item" => $item]);
    }


    /**
     * To update item in DB
     */
    public function updateItem(Request $request, $id)
    {
        $item = Item::find($id);
        $item->name = $request->ItemName;
        $item->brand = $request->Brand;
        $item->model = $request->Model;
        $item->color = $request->Color;
        $item->quantity = $request->Quantity;
        $item->minimum_item = $request->Minimum;
        $item->cost_price = $request->CostPrice;
        $item->selling_price = $request->SellPrice;
        $item->Description = $request->Description;

        $item->save();

        return redirect()->route('list_item')->with('message', 'Your data has successfully updated');
    }

    /**
     * To show order item view
     */
    public function selectItem()
    {
        $items = DB::table('items')->select('id', 'name', 'brand', 'model', 'color', 'quantity')->get();
        return view('items.items-order', ['items' => $items]);
    }

    public function orderItem(Request $request)
    {
        //dd($request->all());
        //di sini calculation tolak quantity item yang dipilih
        $items = DB::table('items')->select('name', 'brand', 'model', 'color', 'quantity', 'cost_price')
                ->where('id', $request->ItemId)->first();
        
        $quantity = $request->Quantity;
        $sellPrice = $request->SellPrice;
        $total = $sellPrice * $quantity;
        $profit = $total - ($items->cost_price * $quantity);
        $balanceQty = $items->quantity - $quantity;

        $item = Item::find($request->ItemId);
        $item->quantity = $balanceQty;
        $item->save();

        $tx = new Transaction();
        $tx->recipientName = $request->ReceipientName;
        $tx->telNo = $request->PhoneNo;
        $tx->recipientDetails = $request->ReceipDetail;
        $tx->itemName = $items->name;
        $tx->brand = $items->brand;
        $tx->model = $items->model;
        $tx->color = $items->color;
        $tx->quantity = $request->Quantity;
        $tx->selling_price = $total;
        $tx->profit = $profit;

        $tx->save();

        return redirect()->back();
    }

    public function checkoutlist()
    {
        $ListofItems = DB::table('transactions')->latest()->paginate(7);
        return view('items.checkout-list', ['ListofItems' => $ListofItems]);
    }

    public function viewCheckoutDetail($id)
    {
        $item = DB::table('transactions')->where('id', $id)->first();
        return view('items.checkout-detail', ['item' => $item]);
    }

}

        //dd($request->all());
        // $id = DB::table('items')->insertGetId(
        //     ['name' => $request->ItemName, 
        //     'brand' => $request->Brand,
        //     'model' => $request->Model , 
        //     'color' => $request->Colour,
        //     'quantity' => $request->Quantity,
        //     'minimum_item' => $request->Minimum,
        //     'cost_price' => $request->CostPrice,
        //     'selling_price' => $request->SellPrice,
        //     'description' => $request->Description,
        //     "created_at" =>  date('Y-m-d H:i:s'),
        //     "updated_at" => date('Y-m-d H:i:s'),]);

