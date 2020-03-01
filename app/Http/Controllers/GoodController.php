<?php

namespace App\Http\Controllers;

use App\Good;
use App\Rules\Maxsize;
use Illuminate\Http\Request;
use App\Imports\GoodsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class GoodController extends Controller
{
    private $path;
//    private $excel_data_array = array();

    public function upload(Request $request){

        $request->validate([
            'excel' => [ 'required', 'file', 'mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'mimes:xlsx', new Maxsize()],
        ]);
        $this->path = $request->file('excel')->store('uploads', 'public');
        $this->import();
        return view('uploadform');
    }

    public function import()
    {
        Excel::import(new GoodsImport(), $this->path, 'public');

//        return redirect('/')->with('success', 'All good!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $good)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Good $good)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Good $good)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
        //
    }
}
