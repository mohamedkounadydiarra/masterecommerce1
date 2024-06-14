<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommandeRequest;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $iduser = Auth::user()->id;
        $commande = Commande::whereHas('produit', function($query) use ($iduser) {
            $query->where('iduser', $iduser);
        })->paginate(10);
        return view('commande_index',compact('commande'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    } 

    public function usercommande()
    {
        // Vérifiez si l'utilisateur est connecté
        if (Auth::check()) {
            // Récupérez l'ID de l'utilisateur connecté
            $iduser = Auth::id();
            // Récupérez toutes les commandes de l'utilisateur
            $commande = Commande::where('iduser', $iduser)->paginate('5');
            $categorie = Categorie::all();

            // Retournez la vue avec les commandes
            return view('user_commande_show', compact('commande','categorie'));
        }

        // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
        return redirect()->route('user_login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommandeRequest $request)
    {
     
        $validatedData = $request->validated();
        $commande = new Commande($validatedData);
        $commande->save();
        $cartKey = 'cart_' . Auth::id();

        // Détruire la session du panier après avoir passé la commande
        $request->session()->forget($cartKey);
        return redirect()->route('produit_show_produit_cart')->with('success', 'Commande ajoutée avec succès!');
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Trouver la commande par ID
         $commande = Commande::find($id);

         // Vérifier si la commande existe
         if ($commande) {
             // Mettre à jour le statut de la commande
             $commande->statut = 'Valider';
             $commande->save();
 
             // Rediriger avec un message de succès
             return redirect()->route('commande_index')->with('success', 'Commande validée avec succès!');
         }
 
         // Rediriger avec un message d'erreur si la commande n'existe pas
         return redirect()->route('commande_index')->with('error', 'Commande introuvable!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();
        return redirect()->back()->with('success','Commande supprimer avec success!');
    }
}
