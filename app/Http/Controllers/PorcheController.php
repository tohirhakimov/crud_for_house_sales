<?php
namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Porche;
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
        return view('porches.create',['houses'=>$houses]);
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
            'house_id'=>'required'
          
        
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
    public function show(Porche $porche)
    {
        return view('porches.show', compact('porche'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Porche  $porche
     * @return \Illuminate\Http\Response
     */
    public function edit(Porche $porche)
    {
        return view('porches.edit', compact('porche'));
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
            'number' => 'required',
            'name' => 'required',
            'house_id'=>'required'
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
            ->with('success', 'Porche deleted successfully');
    }
}

