<?php
namespace App\Http\Controllers;

use App\Models\Porche;
use App\Models\House;

use Illuminate\Http\Request;

class PorcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $porches = Porche::latest()->paginate(5);
        
        return view('porches.index', compact('porches'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    } 



    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $houses=House::orderBy('created_at', 'Desc')->get();
        return view('porches.create', compact('houses'));
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
          
        ]);

        Porche::create($request->all());

        return redirect()->route('porches.index')
            ->with('success', 'Porche created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Porche  $porche
     * @return \Illuminate\Http\Response
     */
    public function show($porche_id, $house_id)
    {
        $houses=House::orderBy('created_at', 'Desc')->get();
        $porche = Porche::find($porche_id);
        return view('porches.show', compact('porche', 'houses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Porche  $porche
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $houses=House::orderBy('created_at', 'Desc')->get();
        $porche = Porche::find($id);
        return view('porches.edit', compact('porche', 'houses'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Porche  $porche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Porche $porche)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'house_id' => 'required'

            
        ]);
        $porche->update($request->all());

        return redirect()->route('porches.index')
            ->with('success', 'Porche updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Porche  $porche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Porche $porche)
    {
        $porche->delete();

        return redirect()->route('porches.index')
            ->with('success', 'flat deleted successfully');
    }
}

