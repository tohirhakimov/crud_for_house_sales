<?php
namespace App\Http\Controllers;

use App\Models\Porche;
use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floors = Floor::latest()->paginate(5);

        return view('floors.index', compact('floors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $porches=Porche::orderBy('created_at', 'Desc')->get();
        return view('floors.create',['porches'=>$porches]);
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
            'porche_id' => 'required'
          
        ]);

        Floor::create($request->all());

        return redirect()->route('floors.index')
            ->with('success', 'floor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Floor $floor)
    {
        return view('floors.show', compact('floor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function edit(Floor $floor)
    {
        return view('floors.edit', compact('floor'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Floor $floor)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'porche_id' => 'required'
            
        ]);
        $floor->update($request->all());

        return redirect()->route('floors.index')
            ->with('success', 'floor updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Floor $floor)
    {
        $floor->delete();

        return redirect()->route('floors.index')
            ->with('success', 'floor deleted successfully');
    }
}

