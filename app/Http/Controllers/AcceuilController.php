<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcceuilController extends Controller
{
    public function acceuil()
    {
        if(Auth::check())
        {
            $categorie = Categorie::all();
            $nouveauproduit = Produit::with('categorie')->orderBy('created_at','desc')->paginate('4');
            $encianproduit = Produit::with('categorie')->orderBy('created_at','asc')->paginate('4');
            return view('acceuil',compact('categorie','nouveauproduit','encianproduit'));
        }
        return view('user_login');
    }

    public function dashboard()
    {
        if(Auth::check())
        {
            return view('dashboard');
        }
        return view('user_login');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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





}
