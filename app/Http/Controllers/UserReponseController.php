<?php

namespace App\Http\Controllers;

use App\Models\UserReponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Reponse;
use App\Models\Certificate;
use App\Models\Notequiz;
class UserReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function indexe()
    {

        $userReponse= UserReponse::where('user_id', Auth::id())->get();
        return view('userReponse',compact('userReponse'));
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
       
  // Tableau pour stocker les réponses liées aux questions
  $reponsesParQuestion = [];
  $totalQuestions = 0; // Total de questions uniques
    $correctAnswers = 0; // Total de réponses correctes

  // Parcourir toutes les questions pour obtenir leurs réponses
  foreach ($request->input() as $key => $value) {
      // Vérifier si l'entrée correspond à un bouton radio d'une question
      if (strpos($key, 'reponse_') !== false) {
          // Extraire l'ID de la question à partir de la clé (par ex. 'reponse_1')
          $questionId = str_replace('reponse_', '', $key);

          // Ajouter la réponse sélectionnée au tableau
          $reponsesParQuestion[$questionId] = $value;
      }
  }

  //dd($reponsesParQuestion);

  // Exemple d'utilisation du tableau (affichage des réponses récupérées)
  foreach ($reponsesParQuestion as $questionId => $reponseId) {
      // Sauvegarder chaque réponse dans la base de données, ou traiter comme nécessaire
      $totalQuestions++;
      UserReponse::create([
        'quiz_id'=>$request->quiz_id,
        'question_id' => $questionId,
            'reponse_id' => $reponseId,
        'user_id' => auth()->user()->id,

    ]);

 $answer = Reponse::find($reponseId);
    if ($answer && $answer->is_correct) {
        $correctAnswers++; // Incrémentation des bonnes réponses
    }


  }
 $total= $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0;

 if ($total >= 60) {
    Notequiz::create([
        'module_id'=>$request->module_id,
        'quiz_id'=>$request->quiz_id,
        'chapitre_id'=>$request->chapitre_id,
        'note' => $total,
            'status' =>"valider",
        'user_id' => auth()->user()->id,

    ]);
   if($request->module_id)
   {
    Certificate::create([
        
        'module_id'=>$request->module_id,
        'note' => $total,
          
        'user_id' => auth()->user()->id,

    ]);
   }
} else {
    Notequiz::create([
        'module_id'=>$request->module_id,
        'quiz_id'=>$request->quiz_id,
        'chapitre_id'=>$request->chapitre_id,
        'note' => $total,
            'status' =>"echouer",
        'user_id' => auth()->user()->id,

    ]);
}

  return redirect('user-reponses#resultats'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserReponse  $userReponse
     * @return \Illuminate\Http\Response
     */
    public function show(UserReponse $userReponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserReponse  $userReponse
     * @return \Illuminate\Http\Response
     */
    public function edit(UserReponse $userReponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserReponse  $userReponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserReponse $userReponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserReponse  $userReponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserReponse $userReponse)
    {
        //
    }
}
