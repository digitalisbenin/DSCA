<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Category;
use App\Models\Difficulete;
use App\Models\ClassUser;
use App\Models\User;
use App\Models\MesCour;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role->name === 'Administrateurs') {
            
            $module = Module::all();
        } else {

            $module = Module::where('user_id', $user->id)->get();
        }

        return view('admin.module.index',compact('module'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie=Category::all();
        $difficulte=Difficulete::all();
        $userClass=ClassUser::all();
        $cours=Cours::all();
        return view('admin.module.create',compact('categorie','difficulte','userClass','cours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $validatedData = $request->validate([
            'titre' => 'required|max:255|unique:formations,titre',
            'description' => 'required',
            "user_class_id" => ['required'],
            'image_url' => 'required|max:255',
             'status' => 'required|max:255',
            'categorie_id' => 'nullable|exists:categories,id',
            'difficulte_id' => 'nullable|exists:difficuletes,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        //$formation = Formation::create($validatedData);
        $module = new Module();

        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/formation_images',$filename);
            $module->image_url = $filename;
        }
       
        $module->titre = $request->titre;
        $module->description = $request->description;
        $module->user_class_id = $request->user_class_id;
        $module->categorie_id = $request->categorie_id;
        $module->difficulte_id = $request->difficulte_id;
        $module->cours_id = $request->cours_id;
        $module->status = $request->status;
        $module->user_id= Auth::id();
        $module->save();

        // session()->flash('success', 'La Formation à été bien créée !');
        $users = User::where('user_class_id', $module->user_class_id)->get();

        foreach ($users as $user) {
            MesCour::create([
                'module_id' => $module->id,
                'user_id' => $user->id,
            ]);
        }

        return redirect('/modules');
        // ->with('success', 'Formations créée avec succès!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return view('',compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $module=Module::findOrfail($id);
        $categorie=Category::all();
        $difficulte=Difficulete::all();
        $userClass=ClassUser::all();
        $cours=Cours::all();
        return view('admin.module.edit',compact('module','categorie','difficulte','userClass','cours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validatedData = $request->validate([
        //     'titre' => 'required|max:255',
        //     'description' => 'required|max:255',
        //     "user_class_id" => ['required'],
        //     'image_url' => 'nullable|max:255',
        //     'status' => 'required|max:255',
        //     'categorie_id' => 'nullable|exists:categories,id',
        //     'difficulte_id' => 'nullable|exists:difficuletes,id',
        //     'user_id' => 'nullable|exists:users,id',
        // ]);
       // $formation->update($validatedData);
        $module = Module::findOrfail($id);


        if ($request->hasFile('image_url')) {
            $path='assets/uploads/formation_images'.$module->image_url;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('image_url');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/formation_images',$filename);
            $module->image_url= $filename;
        }

        $module->titre = $request->titre;
        $module->description = $request->description;
        $module->user_class_id = $request->user_class_id;
        $module->categorie_id = $request->categorie_id;
        $module->difficulte_id = $request->difficulte_id;
        $module->cours_id = $request->cours_id;
        $module->status = $request->status;
        //$formation->user_id= Auth::id();
        $module->save();



        return redirect('/modules');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $module= Module::findOrfail($id);
        $module->delete();

        return redirect('/modules');
    }
}
