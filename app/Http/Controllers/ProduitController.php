<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProduitRequest;
use Illuminate\Support\Facades\Session;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check())
        {
        $user = Auth::user();
        $produit = Produit::with('categorie')->where('iduser', $user->id)->paginate(5);
        return view('produit_index', compact('produit'));
        }
        return redirect()->route('user_login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check())
        {
            $categorie = Categorie::all(); 
            return view('produit_create',compact('categorie'));
        }
        return redirect()->route('user_login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduitRequest $request)
    {
            // Valider les données de la requête
            $data = $request->validated();

            // Gestion de l'upload de la photo
            if ($request->hasFile('photo')) {
                // Enregistrer le fichier sur le serveur
                $path = $request->file('photo')->store('photos', 'public');
                $data['photo'] = $path;
            }

            // Créer le produit avec les données validées
            $produit = Produit::create($data);

            // Retourner une réponse appropriée (par exemple, rediriger avec un message de succès)
            return redirect()->back()->with('success', 'Produit créé avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(Auth::check())
        {
            $produitdetail = Produit::findOrFail($id);
            $categorie = Categorie::all();
            $commentaire = Commentaire::where('idproduit', $id)
            ->orderBy('created_at', 'desc')
            ->get();
            return view('produit_show',compact('produitdetail','categorie','commentaire'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = Produit::findOrFail($id);
        $categorie = Categorie::all(); 
        return view('produit_edit',compact('produit','categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProduitRequest $request, string $id)
    {
        // Valider les données de la requête
        $data = $request->validated();

        // Gestion de l'upload de la photo
        if ($request->hasFile('photo')) {
            // Enregistrer le fichier sur le serveur
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        // Créer le produit avec les données validées
        $produit = Produit::find($id);
        $produit->update($data);
        // Retourner une réponse appropriée (par exemple, rediriger avec un message de succès)
        return redirect()->route('produit_index')->with('success', 'Produit mise a jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect()->route('produit_index')->with('success', 'Le produit a été supprimé avec succès.');
    }


    // the management of cart 
    public function cart(Request $request)
    {
        $idproduit = $request->input('idproduit');
        $quantite = $request->input('quantite');
        $designation = $request->input('designation');
        $prix = $request->input('prix');
        
        // Déterminer la clé de session en fonction de l'utilisateur
        $cartKey = Auth::check() ? 'cart_' . Auth::id() : 'cart_' . session()->getId();
        
        $cart = session()->get($cartKey, []);

        if(isset($cart[$idproduit])) {
            return redirect()->back()->with('error', 'Le produit existe déjà dans le panier !');
        } else {
            $cart[$idproduit] = [
                "designation" => $designation,
                "prix" => $prix,
                "quantite" => $quantite,
                "idproduit" => $idproduit
            ];
        }
        
        session()->put($cartKey, $cart);
        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }

    // show the cart
    public function showcart()
    {
        if(Auth::check())
        {
        // Déterminer la clé de session en fonction de l'utilisateur
        $cartKey = Auth::check() ? 'cart_' . Auth::id() : 'cart_' . session()->getId();

        $categorie = Categorie::all();
        $cart = session()->get($cartKey, []);

        return view('produit_show_produit_cart', compact('cart', 'categorie'));
        }
        return redirect()->route('user_login');
    }

    // delete cart
    public function removeFromCart($id)
    {
        // Déterminer la clé de session en fonction de l'utilisateur
        $cartKey = Auth::check() ? 'cart_' . Auth::id() : 'cart_' . session()->getId();

        $cart = session()->get($cartKey, []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put($cartKey, $cart);
        }

        return redirect()->back()->with('success', 'Produit retiré du panier !');
    }
}
