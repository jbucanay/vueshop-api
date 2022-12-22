<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public const UPDATED_AT = 'modified_at';
    protected $primaryKey = 'product_id';
    protected $fillable = ['name','price', 'quantity', 'type', 'image'];
    
    public function media(){
        return $this->hasMany(Media::class, 'product_id', 'product_id');
    }

    public function inventory(){
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }

}

