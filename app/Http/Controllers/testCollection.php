<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class testCollection extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "<pre>";
        $collection = collect([1,2]);
        echo "Array Count=>".$collection->count();
        echo "<br>";
        echo "Array Sum=>".$collection->sum();
        echo "<br>";
        print_r($collection);
        echo "<br>";
        echo "<br>";
        $items = [
          ["name"=>"Test item 1", "price"=>20], ["name"=>"Test item 2", "price"=>20.5],
            ["name"=>"Test item 3", "price"=>10], ["name"=>"Test item 4", "price"=>5.6],
        ];
        $itemCollection = collect($items);
        print_r($itemCollection);
        echo "<br>";
        echo "Items Total Price => ".$itemCollection->sum("price");

        $item = $itemCollection->first();
        echo "<br>First Item selected. using collection->first() method <br>";
        print_r($item);
        $item = $itemCollection->last();
        echo "<br>Last Item selected. using collection->last() method <br>";
        print_r($item);
        echo "<br><br>Foreach loop on collection using collection->each(callback) method";
        $itemCollection->each(function($item,$index){
            echo "<br> Item<br>";
            print_r($item);

            echo "<br>";
         /*   echo "Item Index=>".$index;*/
            echo "<br>";
        });
        echo "<br><br>using Chunk method:<br><br>";

        $checks = $itemCollection->chunk(3);
        print_r($checks);
        echo "<br><br>";


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    public function show()
    {

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
