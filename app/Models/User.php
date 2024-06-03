<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['pseudo','email','password','telephone','ville','quartier','localisation'];
    
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    /**
     * Get the commandes for the user.
     */
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    /**
     * Get the commentaires for the user.
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    /**
     * Get the categories for the user.
     */
    public function categories()
    {
        return $this->hasMany(Categorie::class);
    }

    /**
     * Get the alertes for the user.
     */
    public function alertes()
    {
        return $this->hasMany(Alerte::class);
    }
}
