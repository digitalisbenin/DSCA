<?php

namespace App\Http\Controllers;

use App\Models\NiveauDificulte;
use Illuminate\Http\Request;

class NiveauDificulteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $difficulte=NiveauDificulte::all();
        return view('admin.difficulte.index',compact('difficulte'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.difficulte.create');
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
         $commentaire = NiveauDificulte::create($validatedData);
 
         return redirect('/difficultes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NiveauDificulte  $niveauDificulte
     * @return \Illuminate\Http\Response
     */
    public function show(NiveauDificulte $niveauDificulte)
    {
        return view('', compact('difficulte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NiveauDificulte  $niveauDificulte
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $difficulte = NiveauDificulte::findOrFail($id);
        return view('admin.difficulte.edit',compact('difficulte')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NiveauDificulte  $niveauDificulte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
             'description' => 'nullable',
         ]);
         $difficulte = NiveauDificulte::findOrfail($id);
         $difficulte->name = $request->name;
         $difficulte->description = $request->description;
         $difficulte->save();
         return redirect('/difficultes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NiveauDificulte  $niveauDificulte
     * @return \Illuminate\Http\Response
     */
    public function destroy(NiveauDificulte $id)
    {
        $categori = NiveauDificulte::findOrfail($id);
        $categori->delete();
        // session()->flash('success', 'Suppression de la difficulté réussie !');
        return redirect('/difficultes');
    }
}
