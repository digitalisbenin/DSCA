<?php

namespace App\Http\Controllers;

use App\Models\MesModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Module;

class MesModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesModules=MesModule::where('user_id', Auth::id())->get();
        $mesModulesIds = $mesModules->pluck('module_id');
    $mesModule = Module::whereIn('id', $mesModulesIds)->get(); 
    
     
        return view('mesModule',compact('mesModule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MesModule  $mesModule
     * @return \Illuminate\Http\Response
     */
    public function show(MesModule $mesModule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MesModule  $mesModule
     * @return \Illuminate\Http\Response
     */
    public function edit(MesModule $mesModule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MesModule  $mesModule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MesModule $mesModule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MesModule  $mesModule
     * @return \Illuminate\Http\Response
     */
    public function destroy(MesModule $mesModule)
    {
        //
    }
}
