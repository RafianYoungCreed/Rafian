<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
class BarangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, Builder $htmlBuilder)
    {
         if ($request->ajax()){
            $barangs = barang::select(['id','barang', 'jumlah','harga']);
            return Datatables::of($barangs)
                ->addColumn('action',function($barangs){
                    return view('datatable._action',[
                        'model' => $barangs,
                        'form_url' => route('barangs.destroy', $barangs->id),
                        'edit_url' => route('barangs.edit', $barangs->id),
                        'confirm_message' => 'Yakin Menghapus '.$barangs->name.'?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'barang', 'barang'=>'barang', 'title'=>'Nama Barang'])
        ->addColumn(['data' => 'jumlah', 'jumlah'=>'jumlah', 'title'=>'Jumlah'])
        ->addColumn(['data' => 'harga', 'harga'=>'harga', 'title'=>'Harga'])
        ->addColumn(['data'=> 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('barangs.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barangs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
