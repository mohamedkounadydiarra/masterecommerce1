<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $categorie = Categorie::all();
        return view('welcome',compact('categorie'));
    }
}
