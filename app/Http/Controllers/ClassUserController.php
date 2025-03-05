<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassUser;

class ClassUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class=ClassUser::all();
        return view('admin.class.index',compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.class.create');
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
         $commentaire = ClassUser::create($validatedData);
 
         return redirect('/class');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = ClassUser::findOrFail($id);
        return view('admin.class.edit',compact('class')); 
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
         $class = ClassUser::findOrfail($id);
         $class->name = $request->name;
         $class->description = $request->description;
         $class->save();
         return redirect('/class');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = ClassUser::findOrfail($id);
        $class->delete();
        // session()->flash('success', 'Suppression de la difficulté réussie !');
        return redirect('/class');
    }
}
