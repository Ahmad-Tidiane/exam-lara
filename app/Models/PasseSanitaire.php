<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasseSanitaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom', 'nom', 'telephone', 'email' ,'cv_recto', 'cv_verso', 'cni_recto', 'cni_verso' , 'billet', 'type-vaccin'
    ];

    public function rendezvous()
    {
        return $this->hasMany(Rendezvous::class);
    }
}
