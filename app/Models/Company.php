<?php

namespace App\Models; // definisce la gerarchia del file 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Drug;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    //ovvero contiene array di attributi che vogliamo siano modificabili
    protected $fillable = ['name'];
    //array vuoto se vogliamo consentire la modifica di tutti gli attributi
    // protected $garded = ["id", "created_at", "updated_at"]; -> 

    public function drugs(): HasMany
    {
        return $this->hasMany(Drug::class);
    }
}
