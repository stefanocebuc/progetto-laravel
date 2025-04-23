<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    protected $fillable = ['atc_code', 'main_ingredient', 'description'];
    protected $table = 'active_ingredients';
}
