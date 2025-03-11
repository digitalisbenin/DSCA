<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\UserCategory;
use App\Models\ClassUser;
use App\Models\Corp;
use App\Models\Poste;
use App\Models\Service;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users=User::all();
     

     
      return view('admin.user.index', compact('users'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role=Role::all();
        $userCategory=UserCategory::all();
        $userClass=ClassUser::all();
        $corps=Corp::all();
        $postes=Poste::all();
        $services=Service::all();
        return view('admin.user.create', compact('role','userCategory','userClass','corps','postes','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     "role_id" => ['required'],
        //     "user_categorie_id" => ['required'],
        //     "user_class_id" => ['required'],
        //     "user_corps_id" => ['required'],
        //     "post_user_id" => ['required'],
        //     "service_user_id" => ['required'],
        //     "prenom" => ['required'],
        //     "telephone" =>['required'],
        //     "matricule" =>['required'],
        //     "sex" =>['required'],
        //     "adresse" => ['required'],
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "role_id" =>$request->role_id,
            "post_user_id" =>$request->post_user_id,
            "user_corps_id" =>$request->user_corps_id,
            "user_categorie_id" =>$request->user_categorie_id,
            "service_user_id" =>$request->service_user_id,
            "user_class_id" =>$request->user_class_id,
            "adresse" => $request->adresse,
            "sex" => $request->sex,
            "matricule" => $request->matricule,
            "prenom" => $request->prenom,
            "telephone" => $request->telephone,

        ]);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $user = User::findOrFail($id);
        $role=Role::all();
        $userCategory=UserCategory::all();
        $userClass=ClassUser::all();
        $corps=Corp::all();
        $postes=Poste::all();
        $services=Service::all();
        return view('admin.user.edit',compact('user','role','userCategory','userClass','corps','postes','services')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $user = User::findOrfail($id);
    

        
     
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;
        $user->matricule = $request->matricule;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->post_user_id = $request->post_user_id;
        $user->user_corps_id = $request->user_corps_id;
        $user->user_categorie_id = $request->user_categorie_id;
        $user->user_class_id = $request->user_class_id;
        $user->service_user_id = $request->service_user_id;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        $user->prenom = $request->prenom;
        $user->post = $request->post;
        $user->save();



        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        // session()->flash('success', 'Suppression de la difficulté réussie !');
        return redirect('/users');
    }
}
