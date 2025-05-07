<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Company;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drug extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'minsan_code', 'description', 'expiration_date', 'price', 'company_id', 'active_ingredient_id'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function users():BelongsToMany{
        return $this->belongsToMany(User::class, 'carts');
    }
}
