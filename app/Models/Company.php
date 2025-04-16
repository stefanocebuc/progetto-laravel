<?php

namespace App\Models; // definisce la gerarchia del file 

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];
    // protected $garded = ["id", "created_at", "updated_at"]; -> 
    //ovvero contiene array di attributi che non vogliamo siano modificabili
    //array vuoto se vogliamo consentire la modifica di tutti gli attributi
}
