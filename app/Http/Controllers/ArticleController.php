<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = ['message' => 'article index'];
        return response($response, 200);
        
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = ['message' => 'update function'];
        return response($response, 200);
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


    protected function paginate (Collection $collection){


        $collection = DB::table('articles')->get();
      
        $page = LengthAwarePaginator::resolveCurrentPage();
        
        $perPage = 5;
    
        $results = $collection->slice(($page-1)* $perPage, $perPage)->values();
    
        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage,[
            'path'=>LengthAwarePaginator::resolveCurrentPage()
        ]);

       return  response($paginated, 200);
    
    }
}
