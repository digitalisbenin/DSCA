<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use Illuminate\Support\Facades\File;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours=Cours::all();
        return view('admin.cours.index',compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.cours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $cours = new Cours();

       if ($request->hasFile('image_url')) {
           $file = $request->file('image_url');
           $ext = $file->getClientOriginalExtension();
           $filename = time().'.'.$ext;
           $file->move('assets/uploads/formation_images',$filename);
           $cours->image_url = $filename;
       } else {
        $cours->image_url = null; // Assurez-vous que la colonne accepte NULL dans la DB
    }
      
       $cours->name = $request->name;
       $cours->objectifs = $request->objectifs;
       $cours->nombre_module = $request->nombre_module;
       
       $cours->save();
       return redirect('/cours');
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
        $cours = Cours::findOrFail($id);
        return view('admin.cours.edit',compact('cours'));
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
        $cours = Cours::findOrfail($id);


        if ($request->hasFile('image_url')) {
            $path='assets/uploads/formation_images'.$cours->image_url;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('image_url');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/formation_images',$filename);
            $cours->image_url= $filename;
        }

        $cours->name = $request->name;
        $cours->objectifs = $request->objectifs;
        $cours->nombre_module = $request->nombre_module;
        $cours->save();



        return redirect('/cours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cours= Cours::findOrfail($id);
        $cours->delete();

        return redirect('/cours');
    }
}
