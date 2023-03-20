<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carts;

class CartsController extends Controller
{
    public function getCart(Request $request)
    {
        $user = $request->user();
        if(!$user){
          return response()->json([
            'error' => 'Faça o login'
          ], 403);
        }

        $cart = Carts::where('user_id',$user->id)->whereIn('status', ['new', 'open'])->orderBy('updated_at', 'desc')->with('itens')->first();

        return response()->json($cart);
    }

    public function addItem(Request $request)
    {
        $fid = $request->input('fid');
        $item = $request->input('item');
        $qtd = $request->input('qtd');

        $user = $request->user();
        if(!$user){
          return response()->json([
            'error' => 'Faça o login'
          ], 403);
        }

        $cart = Carts::where('user_id',$user->id)->whereIn('status', ['new', 'open'])->orderBy('updated_at', 'desc')->first();

        $item = Cart_itens::create([
          'cart_id' => $cart->id,
          'fornecedor_id' => $fid,
          'item_id' => $item,
          'qtd' => $qtd,
        ]);

        return response()->json([
          'status' => 'added',
          'item' => $item
        ]);
    }

    public function editItem(Request $request)
    {
        $id = $request->input('id');

        $user = $request->user();
        if(!$user){
          return response()->json([
            'error' => 'Faça o login'
          ], 403);
        }

        $cart = Carts::where('user_id',$user->id)->whereIn('status', ['new', 'open'])->orderBy('updated_at', 'desc')->first();

        $item = Cart_itens::create([
          'cart_id' => $cart->id,
          'fornecedor_id' => $fid,
          'item_id' => $item,
          'qtd' => $qtd,
        ]);

        return response()->json([
          'status' => 'added',
          'item' => $item
        ]);
    }
}
