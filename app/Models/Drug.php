<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Company;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drug extends Model
{
    protected $fillable = ['minsan_code', 'name', 'description', 'expiration_date', 'price', 'company_id', 'active_ingredient_id'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}
