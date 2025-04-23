<?php

namespace App\Models; // definisce la gerarchia del file 

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //ovvero contiene array di attributi che vogliamo siano modificabili
    protected $fillable = ['name'];
    //array vuoto se vogliamo consentire la modifica di tutti gli attributi
    // protected $garded = ["id", "created_at", "updated_at"]; -> 
}
