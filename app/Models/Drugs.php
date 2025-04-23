<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drugs extends Model
{
    protected $fillable = ['minsan_code', 'name', 'description', 'expiration_date', 'price', 'company_id', 'active_ingredient_id'];
}
