<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Sold_flat;
use App\Models\Flat;
use Illuminate\Http\Request;

class SoldFlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sold_flats = Flat::where("status","sold")->paginate(5);
        $clients=Client::orderBy('created_at', 'DESC')->get();
        return view('sold_flats.index', compact('sold_flats', 'clients'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=Client::orderBy('created_at', 'DESC')->get();
        $flats=Flat::orderBy('created_at', 'DESC')->get();
        return view('sold_flats.create', compact ('clients', 'flats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'client_id' => 'required',
            'flat_id' => 'required',
          
        ]);

        Sold_flat::create($request->all());

        return redirect()->route('sold_flats.index')
            ->with('success', 'sold_flat created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sold_flat  $sold_flat
     * @return \Illuminate\Http\Response
     */
    public function show($sold_flat)
    {
        $clients=Client::orderBy('created_at', 'Desc')->get();
        $flats=Flat::orderBy('created_at', 'Desc')->get();
        $sold_flat = Flat::where('status', 'sold');
        return view('sold_flats.show', compact('sold_flat', 'clients', 'flats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sold_flat  $sold_flat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients=Client::orderBy('created_at', 'DESC')->get();
        $flats=Flat::where('status', 'sold')->firstOrFail();
        $sold_flat = Flat::where('status', 'sold');
        return view('sold_flats.edit', compact ('sold_flat', 'clients', 'flats'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sold_flat  $sold_flat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sold_flat $sold_flat)
    {
        
        $sold_flat->update($request->all());

        return redirect()->route('sold_flats.index')
            ->with('success', 'sold_flat updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sold_flat  $sold_flat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sold_flat $sold_flat)
    {
        $sold_flat->delete();

        return redirect()->route('sold_flats.index')
            ->with('success', 'sold_flat deleted successfully');
    }
}

