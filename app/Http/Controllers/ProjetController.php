<?php

namespace App\Http\Controllers;

use App\Projet;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mailers\AppMailer;

class ProjetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::paginate(10);

        return view('projet.index', compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = Projet::all();

        return view('projet.create', compact('projets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'titre' => 'required',
            'description' => 'required'
        ]);

        $projet = new Projet([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'status' => "Ouvert"
        ]);

        $projet->save();

        return redirect()->back()->with("status", "Un projet avec l'ID: #$projet->id a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($projet_id)
    {
        $projet = Projet::where('id', $projet_id)->firstOrFail();

        return view('projet.show', compact('projet'));
    }

    public function delete($projet_id)
    {
        Projet::where('id', $projet_id)->delete();

        return redirect()->back();
    }
}