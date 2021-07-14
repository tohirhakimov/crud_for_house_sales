<?php
namespace App\Http\Controllers;

use App\Models\Porche;
use App\Models\Floor;
use App\Models\House;
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
    public function show($house_id, $porche_id, $floor_id)
    {
        $houses=House::orderBy('created_at', 'Desc')->get();
        $porches=Porche::orderBy('created_at', 'Desc')->get();
        
        $porche = Porche::find($porche_id);
        $floor = Floor::find($floor_id);
        return view('floors.show', compact('floor', 'porches', 'houses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $porches=Porche::orderBy('created_at', 'Desc')->get();
        $floors=Floor::orderBy('created_at', 'Desc')->get();
        $floor = Floor::find($id);
        return view('floors.edit', compact('floor', 'porches', 'floors'));
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

