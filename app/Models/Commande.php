<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ['localisation','quantite','total','idproduit','iduser',];

    public function user()
    {
        return $this->belongsTo(User::class,'iduser');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class,'idproduit');
    }
}
