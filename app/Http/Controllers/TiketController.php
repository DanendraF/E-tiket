<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;

class TiketController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Tiket::all();

        return response()->json([
            'message' => 'Load Data Tiket Success!',
            'data' => $table
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Tiket::create([
            "jenis_tiket" => $request->jenis_tiket,
            "tanggal" => $request->tanggal,
            "harga_tiket" => $request->harga_tiket,
            "jumlah_tiket" => $request->jumlah_tiket,
            "desc_tiket" => $request->desc_tiket
        ]);

        return response()->json([
            "message"=>"Store Data Tiket Success!",
            "Tiket"=>$table
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Tiket::find($id);
        if($table){
            return $table;
        }else{
            return ["message" =>"Data Tiket Not Found!"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table = Tiket::find($id);
        if($table){
            $table->jenis_tiket = $request->jenis_tiket ? $request->jenis_tiket : $table->jenis_tiket;
            $table->tanggal = $request->tanggal ? $request->tanggal : $table->tanggal;
            $table->harga_tiket = $request->harga_tiket ? $request->harga_tiket : $table->harga_tiket;
            $table->jumlah_tiket = $request->jumlah_tiket ? $request->jumlah_tiket : $table->jumlah_tiket;
            $table->desc_tiket = $request->desc_tiket ? $request->desc_tiket : $table->desc_tiket;
            $table->save();

            return $table;
        }else{
            return ["message"=>"Data Tiket Not Found!"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Tiket::find($id);
        if($table){
            $table->delete();

            return ["message"=>"Delete Tiket Success!"];
        }else{
            return ["message"=>"Data Tiket Not Found!"];
        }
    }
}


