<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['designation','description','photo','prix','idcategorie','iduser'];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idcommande');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'idcommentaire');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'idcategorie');
    }
}
