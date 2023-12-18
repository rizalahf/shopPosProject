<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;

    public function products() {
        return $this->hasMany ('App\Models\Product', 'catalog_id');
    }

    protected $fillable = ['suplier_name', 'address'];
}
