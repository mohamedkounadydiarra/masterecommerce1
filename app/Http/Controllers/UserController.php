<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('created_at','desc')->paginate(5);
        return view('user_index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'pseudo' => $data['pseudo'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'telephone' => $data['telephone'],
            'ville' => $data['ville'],
            'quartier' => $data['quartier'],
            'localisation' => $data['localisation']
        ]);
        return redirect()->route('user_login')->with('success', 'Votre compte a été avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
           die('Utilisateur non trouvé');
        }
        return view('user_show', compact('user'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès');
    }


    public function login()
    {
        return view('user_login');
    }

    public function loginstore(LoginRequest $request)
    {

        $credentials = $request->only('pseudo', 'password');
        if (Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->route('acceuil');
           
        }
       return redirect()->route('user_login')->withErrors('donnee incorrecte');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user_login');
    }
}
