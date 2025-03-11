<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); // Récupère l'utilisateur connecté

        // Vérifie le rôle de l'utilisateur
        if ($user->role->name === 'Administrateurs') {
            // L'utilisateur est un administrateur, récupère toutes les réponses
            $reponse = Reponse::all();
        } else {
            // L'utilisateur n'est pas un administrateur, filtre les réponses par utilisateur
            $reponse = Reponse::whereHas('question.quiz', function ($query) use ($user) {
                $query->whereHas('modules', function ($subQuery) use ($user) {
                    $subQuery->where('user_id', $user->id);
                });
            })->get();
        }

        return view('admin.reponse.index', compact('reponse')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creates($id)
    {
        $quiz= Question::whereHas('quiz', function ($query) use ($id) {
            $query->where('formation_id', $id);
        })->get();
        $moduleId=$id;
        return view('admin.reponse.create',compact('quiz','moduleId'));
    }
    public function createe($id)
    {
        $quiz= Question::where('quiz_id',$id)->get();
        $moduleId=$id;
        return view('admin.reponse.create',compact('quiz','moduleId'));
    }
    public function create()
    {
        $quiz= Question::all();
        
        return view('admin.reponse.create',compact('quiz'));
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
            'title' => 'required|max:255',
            'is_correct' => 'nullable',
            'question_id' => 'required|exists:questions,id',
        ]);
        $reponse=Reponse ::create($validatedData);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reponse  $reponse
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $question = Question::where('id',$id)->first();
        $reponse = Reponse::where('question_id',$id)->get();
        $questionID=$id;
        return view('admin.reponse.show', compact('reponse','questionID','question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reponse  $reponse
     * @return \Illuminate\Http\Response
     */
    public function edit(Reponse $reponse, $id)
    {
        $question=Question::all();
        $reponse= Reponse::findOrfail($id);
        return view('admin.reponse.edit', compact('reponse','question'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reponse  $reponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'is_correct' => 'nullable',
            'question_id' => 'nullable|exists:questions,id',
        ]);
        $reponse= Reponse::findOrfail($id);
        $reponse->update($validatedData);
        return redirect('/modules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reponse  $reponse
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $reponse = Reponse::findOrfail($id);
        $reponse->delete();

        return back();
    }
}
