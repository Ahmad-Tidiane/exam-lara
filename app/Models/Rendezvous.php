<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    use HasFactory;
    // protected $primaryKey = 'passe_sanitaires_id';

    protected $fillable = [
        'passe_sanitaires_id','date', 'heure','observation', 'type_envoi'
    ];
    public function passesanitaires()
    {
        return $this->belongsTo(PasseSanitaire::class);
    }
}
