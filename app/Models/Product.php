<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use HasFactory,softDeletes;

    protected $dates = ['deleted_at'];

    public function brand(){
        return $this -> belongsTo(Brand::class);
    }
}
