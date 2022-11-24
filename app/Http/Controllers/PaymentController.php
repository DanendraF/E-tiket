<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Tiket;
use Auth;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Payment::all();

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
        $customer_id = Auth::id();

        $id_tiket = $request->ID_tiket;
        $harga_tiket = Tiket::where('id', $id_tiket)->value('harga_tiket');


        $table = Payment::create([
            "ID_tiket" => $id_tiket,
            "Customer_ID" => $customer_id,
            "harga_tiket" => $harga_tiket,
            "Tanggal_Pembayaran" => $request->tanggal_pembayaran,
        ]);

        return response()->json([
            'message' => 'Store Data Tiket Success!',
            'data' => $table
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Payment::find($id);
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
        $table = Payment::find($id);
        if($table){
            $table->ID_tiket = $request->ID_tiket ? $request->ID_tiket : $table->ID_tiket;
            $table->Customer_ID = $request->Customer_ID ? $request->Customer_ID : $table->Customer_ID;
            $table->harga_tiket = $request->harga_tiket ? $request->harga_tiket : $table->harga_tiket;
            $table->Tanggal_Pembayaran = $request->Tanggal_Pembayaran ? $request->Tanggal_Pembayaran : $table->Tanggal_Pembayaran;
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
        $table = Payment::find($id);
        if($table){
            $table->delete();

            return ["message"=>"Delete Tiket Success!"];
        }else{
            return ["message"=>"Data Tiket Not Found!"];
        }
    }
}
