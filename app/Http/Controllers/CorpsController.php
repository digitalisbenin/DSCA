<?php

namespace App\Http\Controllers;

use App\Models\Corp;
use Illuminate\Http\Request;

class CorpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corp=Corp::all();
        return view('admin.corps.index',compact('corp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.corps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);
        $corp = Corp::create($validatedData);

        return redirect('/corps');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corp  $corp
     * @return \Illuminate\Http\Response
     */
    public function show(Corp $corp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Corp  $corp
     * @return \Illuminate\Http\Response
     */
    public function edit(Corp $corp, $id)
    {
        $corp = Corp::findOrFail($id);
        return view('admin.corps.edit',compact('corp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Corp  $corp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corp $corp, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);
        $corp = Corp::findOrfail($id);
        $corp->name = $request->name;
        $corp->description = $request->description;
        $corp->save();
        return redirect('/corps');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corp  $corp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corp $corp, $id)
    {
        $corp = Corp::findOrfail($id);
        $corp->delete();
        // session()->flash('success', 'Suppression de la catégorie réussie !');
        return redirect('/corps');
    }
}
