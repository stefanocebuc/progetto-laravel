<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Drug;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use SoftDeletes;
    protected $fillable = ['atc_code', 'main_ingredient', 'description'];
    protected $table = 'active_ingredients';

    public function drugs(): HasMany
    {
        return $this->hasMany(Drug::class, 'active_ingredient_id');
    }
}
