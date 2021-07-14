<?php
namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Floor;
use App\Models\Porche;
use App\Models\House;
use App\Models\Client;
use App\Models\Sold_flat;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flats = Flat::latest()->paginate(5);

        return view('flats.index', compact('flats'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $flats = Flat::latest()->paginate(5);
        $floors=Floor::orderBy('created_at', 'Desc')->get();
        return view('flats.create',['floors'=>$floors], compact('flats'));
    }

    public function sell($id)
    {
        
        $floors=Floor::orderBy('created_at', 'Desc')->get();
        $flats=Flat::orderBy('created_at', 'Desc')->get();
        $clients = Client::orderBy('created_at', 'Desc')->get();
        $flat = Flat::find($id);
        return view('flats.sell', compact('flat', 'floors','flats', 'clients'));
    
        
    }
    public function readyToSell(Request $request)
    {
        $flat=Flat::find($request->flat_id);
        $client=Client::find($request->client_id);
        $total_price=$flat->price*$flat->area;
        Sold_flat::create([
            'flat_id'=>$flat->id,
            'client_id'=>$client->id,
            'total_price'=>$total_price
        ]);
        return redirect()->route('flats.selling');
    
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Flat::create($request->all());

        return redirect()->route('flats.index')
            ->with('success', 'flat created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function show($house_id, $porche_id, $floor_id, $flat_id)
    {
        $houses=House::orderBy('created_at', 'Desc')->get();
        $porches=Porche::orderBy('created_at', 'Desc')->get();
        $floors=Floor::orderBy('created_at', 'Desc')->get();
        $floor = Floor::find($floor_id);
        $flat = Flat::find($flat_id);
        $porche = Porche::find($porche_id);
        
        
        return view(' flats.show', compact('flat', 'floors', 'porches', 'houses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $floors=Floor::orderBy('created_at', 'Desc')->get();
        $flats=Flat::orderBy('created_at', 'Desc')->get();
        $flat = Flat::find($id);
        return view('flats.edit', compact('flat', 'floors', 'flats'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flat $flat)
    {
        
        $flat->update($request->all());
        
        return redirect()->route('flats.index')
            ->with('success', 'flat updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flat $flat)
    {
        $flat->delete();

        return redirect()->route('flats.index')
            ->with('success', 'flat deleted successfully');
    }
}

