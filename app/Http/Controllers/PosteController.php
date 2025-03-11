<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Poste;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postes=Poste::all();
        return view('admin.post.index',compact('postes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $services=Service::where('id',$id)->get();
        return view('admin.post.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $formation = new Poste();
        // $formation->titre = $request->titre;
        // $formation->description = $request->description;
        // $formation->user_class_id = $request->user_class_id;
        // $formation->categorie_id = $request->categorie_id;
        // $formation->save();

        // // session()->flash('success', 'La Formation à été bien créée !');


        // return redirect('/formations');
        $validatedData = $request->validate([

            'name' => 'required|max:255',
            'description' => 'nullable',
            'service_id' => 'nullable',

        ]);
        $postes=Poste ::create($validatedData);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$postes = Poste::all();
        $postes = Poste::where('service_id', $id)->get();
        $services=Service::where('id', $id)->get();

            $quizid =$id;
        return view('admin.post.shows',compact('postes','quizid','services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postes= Poste::findOrfail($id);
        //$formation=Formation::all();
        return view('admin.post.edit', compact('postes'));
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
        $validatedData = $request->validate([

            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);
        $postes = Poste::findOrfail($id);
        $postes->update($validatedData);

        return redirect('/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postes = Poste::findOrfail($id);
        $postes->delete();
        // session()->flash('success', 'Suppression de la difficulté réussie !');
        return back();
    }
}
