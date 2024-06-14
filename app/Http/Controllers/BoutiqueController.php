<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class BoutiqueController extends Controller
{
    public function index()
    {
        $categorie = Categorie::all();
        $produits = Produit::with('user')->paginate(16);
        return view('boutique', compact('produits','categorie'));
    }
}
