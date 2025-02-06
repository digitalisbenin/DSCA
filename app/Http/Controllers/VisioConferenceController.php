<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\VisioConference;
use App\Models\User;
use App\Models\Meet;
use Illuminate\Http\Request;

class VisioConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$conference=VisioConference::all();
        $user = Auth::user();

        if ($user->role->name === 'Administrateurs') {
            
            $conference = VisioConference::all();
        } else {

            $conference = VisioConference::where('user_id', $user->id)->get();
        }
        return view('admin.conference.index',compact('conference'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conference.create');
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
            'titre' => 'required|max:255',
            'lien_meet' => 'required|max:255',
            'date' => 'required|max:255',
            'debut' => 'required|max:255',
            'fin' => 'required|max:255',
            
        ]);
        //$formation = Formation::create($validatedData);
        $conference = new VisioConference();

        $conference->titre = $request->titre;
        $conference->date = $request->date;
        $conference->debut = $request->debut;
        $conference->fin = $request->fin;
        $conference->lien_meet = $request->lien_meet;
        $conference->user_id= Auth::id();
        $conference->save(); 
        return redirect('/visio-conferences');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisioConference  $visioConference
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
         $users=User::where('role_id',3)->get();
       //Y $users=User::all();
        $conference = VisioConference::findOrFail($id);
        return view('admin.conference.show',compact('conference','users')); 
    }
    public function shows( $id)
    {
         $users=User::where('role_id',3)->get();
        //$users=User::all();
        $conference = VisioConference::findOrFail($id);
        $selectedUsers = Meet::where('visio_conferences_id', $id)->pluck('user_id')->toArray();
        return view('admin.conference.shows',compact('conference','users','selectedUsers')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisioConference  $visioConference
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $conference = VisioConference::findOrFail($id);
        return view('admin.conference.edit',compact('conference')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisioConference  $visioConference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'lien_meet' => 'required|max:255',
            'date' => 'required|max:255',
            'debut' => 'required|max:255',
            'fin' => 'required|max:255',
            
        ]);
        //$formation = Formation::create($validatedData);
        $conference = VisioConference::findOrFail($id);

        $conference->titre = $request->titre;
        $conference->date = $request->date;
        $conference->lien_meet = $request->lien_meet;
        $conference->debut = $request->debut;
        $conference->fin = $request->fin;
        $conference->user_id= Auth::id();
        $conference->save();

        return redirect('/visio-conferences');
    }
    public function updates(Request $request, $id)
    {
      
        // $conference = VisioConference::findOrFail($id);

        $selectedUsers = $request->input('selected_users', []);

    // Supprimer les anciens utilisateurs liés à cette visioconférence
    Meet::where('visio_conferences_id', $id)->delete();

    // Ajouter les nouveaux utilisateurs sélectionnés
    foreach ($selectedUsers as $userId) {
        Meet::create([
            'visio_conferences_id' => $id,
            'user_id' => $userId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


        return redirect('/visio-conferences');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisioConference  $visioConference
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $conference = VisioConference::findOrfail($id);
        $conference->delete();
        
        return redirect('/visio-conferences');
    }
}
