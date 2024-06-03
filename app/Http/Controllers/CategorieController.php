<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\CategorieRequest;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $iduser = Auth::id();  // Get the ID of the authenticated user
            $categorie = Categorie::where('iduser', $iduser)->orderBy('created_at', 'desc')->paginate(5);  
            return view('categorie_index', compact('categorie'));
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
            return view('categorie_create');
        }
        return redirect()->route('user_login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieRequest $request)
    {
        $data = $request->validated();
        $categorie = new Categorie();
        $categorie->nomcategorie = $data['nomcategorie'];
        $categorie->iduser = Auth::id();
        $categorie->save();

        return redirect()->back()->with('success','la caregorie a ete cree avec success!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categorie_edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategorieRequest  $request, string $id)
    {
        $data = $request->validated();
        $categorie = Categorie::findOrFail($id);
        $categorie->update($data);
        return redirect()->back()->with('success', 'La catégorie a été mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return redirect()->back()->with('success', 'La catégorie a été supprimée avec succès!');
    }
}
