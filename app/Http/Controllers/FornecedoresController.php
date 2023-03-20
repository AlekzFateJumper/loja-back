<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Fornecedor;

class FornecedoresController extends Controller
{
    public function getProducts($fid)
    {
        $fornecedor = Fornecedor::find($fid);
        if(!$fornecedor){
          return response()->json([
            'error' => 'Fornecedor inválido'
          ], 404);
        }
        $response = Http::get($fornecedor->all_prod_url);
        $jsonData = $response->json();

        return response()->json($jsonData);
    }

    public function getProduct($fid, $pid)
    {
        $fornecedor = Fornecedor::find($fid);
        if(!$fornecedor){
          return response()->json([
            'error' => 'Fornecedor inválido'
          ], 404);
        }
        $url = str_replace('<id>', $pid, $fornecedor->single_prod_url);
        $response = Http::get();
        $jsonData = $response->json();

        return response()->json($jsonData);
    }

    private function sortProds($a, $b) {
        return $a['id'] - $b['id'];
    }

    public function getAllProducts()
    {
        $fornecedores = Fornecedor::all();

        $produtos = [];

        $fornecedores->each(function($fornecedor) use (&$produtos)
        {
              $fid = $fornecedor->id;
              $response = Http::get($fornecedor->all_prod_url);
              $jsonData = array_map(function($prod) use ($fid) {
                $prod['fornecedor'] = $fid;
                return $prod;
              }, $response->json());

              $produtos = array_merge($produtos, $jsonData);
        });

        usort($produtos, [$this, "sortProds"]);

        return response()->json($produtos);
    }

}
