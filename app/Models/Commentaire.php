<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = ['description','idproduit','iduser'];

    public function produit()
    {
        return $this->belongsTo(Produit::class,'idproduit');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'iduser');
    }
}
