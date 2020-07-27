<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = DB::table('promotions') ->select( 'promotions.id', 'promotions.title', 'promotions.price')->get();
      
        $page = LengthAwarePaginator::resolveCurrentPage();
        
        $perPage = 5;
    
        $results = $collection->slice(($page-1)* $perPage, $perPage)->values();
    
        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage,[
            'path'=>LengthAwarePaginator::resolveCurrentPage()
        ]);

       return  response($paginated, 200);
    
    }

    public function search($id)
    {

       $collection = DB::table('promotions')
	        ->where('promotions.id', '=', $id)
            ->select( 'promotions.title', 'promotions.price', 'promotions.address', 
                    'promotions.latitude', 'promotions.longitude')->get();
        
       return response($collection, 200);
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
