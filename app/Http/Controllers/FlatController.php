<?php
namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Floor;
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
        $floors=Floor::orderBy('created_at', 'Desc')->get();
        return view('flats.create',['floors'=>$floors]);
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
            'name' => 'required',
            'number' => 'required',
            'area' => 'required',
            'price' => 'required',
            'floor_id' => 'required'
        ]);

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
    public function show(Flat $flat)
    {
        return view('flats.show', compact('flat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function edit(Flat $flat)
    {
        return view('flats.edit', compact('flat'));
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
        $request->validate([
            'number' => 'required',
            'name' => 'required',
            'area' => 'required',
            'price' => 'required',
            'floor_id' => 'required'
        ]);
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

