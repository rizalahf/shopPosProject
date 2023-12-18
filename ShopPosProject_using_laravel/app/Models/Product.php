<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function catalog() {
        return $this->belongsTo('App\Models\Catalog', 'id');
    }

    public function suplier() {
        return $this->belongsTo('App\Models\Suplier', 'id');
    }

    public function transaction() {
        return $this->belongsTo('App\Models\Transaction', 'id');
    }

    protected $fillable = ['product_name', 'price', 'qty', 'catalog_id', 'suplier_id', 'status'];
}
