<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store;
use App\Http\Resources\Store as StoreResource;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();

        if(!$stores){
            return response()->json(['Whoops' => 'Nenhuma loja cadastrada']);
        }

        StoreResource::wrap('Lojas');
        return StoreResource::collection($stores);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::find($id);

        if(!$store){
            return response()->json(['Whoops' => 'Nenhuma loja cadastrada']);
        }

        StoreResource::wrap('Loja');
        return StoreResource::make($store);
    }

}
