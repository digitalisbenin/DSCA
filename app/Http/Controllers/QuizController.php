<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Formation;
use App\Models\Module;
use App\Models\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $quiz=Quiz::all();
    //     return view('admin.quiz.index',compact('quiz'));
    // }
    public function index()
    {
        $user = Auth::user(); // Récupère l'utilisateur connecté

        // Vérifie le rôle de l'utilisateur
        if ($user->role->name === 'Administrateurs') {
            // L'utilisateur est un administrateur, récupère tous les chapitres
            $quiz = Quiz::all();
        } else {
            // L'utilisateur est un formateur ou autre, récupère les chapitres liés à ses formations
            $quiz = Quiz::whereHas('module', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
        }

        return view('admin.quiz.index',compact('quiz'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $module=Module::where('id', $id)->get();
        return view('admin.quiz.create',compact('module'));
    }
    public function creates($id)
    {
        $chapitre=Chapitre::where('id', $id)->get();
        return view('admin.quiz.create2',compact('chapitre'));
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
        //'title', 'description' ,'status'
        $validatedData = $request->validate([

            'title' => 'required|max:255',
            'status' => 'required',
            'description' => 'nullable',
            'module_id' => 'nullable|exists:modules,id',
            'chapitre_id' => 'nullable|exists:chapitres,id',
        ]);
        $quiz=Quiz ::create($validatedData);

        return back();
        // ->with('success', 'Quiz créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('', compact('quiz'));
        $user = Auth::user(); // Récupère l'utilisateur connecté

        // Vérifie le rôle de l'utilisateur
        if ($user->role->name === 'Administrateurs') {
            // L'utilisateur est un administrateur, récupère tous les chapitres
            $quiz = Quiz::all();
        } else {
            // L'utilisateur est un formateur ou autre, récupère les chapitres liés à ses formations
            $quiz = Quiz::whereHas('module', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->where('module_id', $id)->get();
        }
        $module=Module::where('id', $id)->get();
            $quizid =$id;
        return view('admin.quiz.show',compact('quiz','quizid', 'module'));
    }
    public function shows($id)
    {
        // return view('', compact('quiz'));
        $user = Auth::user(); // Récupère l'utilisateur connecté

        // Vérifie le rôle de l'utilisateur
        if ($user->role->name === 'Administrateurs') {
            // L'utilisateur est un administrateur, récupère tous les chapitres
            $quiz = Quiz::all();
        } else {
            // L'utilisateur est un formateur ou autre, récupère les chapitres liés à ses formations
            $quiz = Quiz::where('chapitre_id', $id)->get();
        }
        $chapitre=Chapitre::where('id', $id)->get();

            $quizid =$id;
        return view('admin.quiz.shows',compact('quiz','quizid','chapitre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)

    {
        $quiz= Quiz::findOrfail($id);
        $module=Module::all();
        return view('admin.quiz.edit', compact('quiz','module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        
        $validatedData = $request->validate([

            'title' => 'required|max:255',
            'status' => 'required',
            'description' => 'nullable',
        ]);
        $quiz = Quiz::findOrfail($id);
        $quiz->update($validatedData);

        return redirect('/modules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz,$id)
    {
        $quiz = Quiz::findOrfail($id);
        $quiz->delete();

        return back();
    }
}
