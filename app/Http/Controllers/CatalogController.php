<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cat;
use App\Models\Item;
use App\Models\Cart;

class CatalogController extends Controller
{
    public function catalog($id = 0)
    {
        $categories = Cat::all();

        if($id == 0) {
            $items = Item::all();
        } else {
            $items = Item::where('cat', $id)->get();
            $catName = Cat::find($id);
            return view('index', ['categories' => $categories, 'items' => $items, 'catName' => $catName]);
        }     
        
        return view('index', ['categories' => $categories, 'items' => $items]);
    }

    public function filter(Request $r)
    {
        $filter = Item::when($r->id, function($query, $id) {
            $query->where('items.cat', $id);
        })->orderBy($r->type, 'asc')->get();

        return view('incl.item', ['items' => $filter]);
    }

    public function item($id)
    {
        $item = Item::find($id);

        return view('item', ['item' => $item]);
    }

    public function addToCart(Request $r)
    {
        $item = Item::find($r->id);

        if($item->amount > 0) {

            $cart = Cart::where('item', $r->id)->where('user', Auth::user()->id)->where('status', 'Отклонен')->first();

            

            if(!is_null($cart)) {
                $cart->amount = $cart->amount + 1;
                $cart->save();
            } else {
                Cart::create([
                    'item' => $r->id,
                    'user' => Auth::user()->id,
                    'amount' => '1',
                    'status' => 'Отклонен',
                ]);
            }

            $item->amount = $item->amount - 1;
            $item->save();

        } else {
            return response()->json(['error' => 'error'], 400);
        }
    }
}
