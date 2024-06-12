<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentaireRequest;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $produit = Produit::findOrFail($id);
        $commentaires = Commentaire::where('idproduit', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('produit_show', compact('produit', 'commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentaireRequest $request)
    {
        $validatedData = $request->validated();
        $commentaire = new Commentaire($validatedData);
        $commentaire->save();
        //return redirect()->back()->route('produit_show');
    }


    public function allcomment(string $id)
    {
       // tout les commentaire vis a vie d'un produit donner
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();
        return redirect()->back()->with('success','Commentaire supprimer avec success!');
    }
}
