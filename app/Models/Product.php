<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     use HasFactory;
    protected $table = 'product';
    public const UPDATED_AT = 'modified_at';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_name', 'product_description', 'product_sku','price', 'product_condition', 'shipping_cost'];
    protected $hidden = ['created_at', 'modified_at'];
    
    public function media(){
        return $this->hasMany(Media::class, 'product_id', 'product_id');
    }

    public function inventory(){
        return $this->hasOne(Inventory::class, 'inventory_id');
    }

    public function discount(){
        return $this->hasOne(Discount::class, 'discount_id');
    }

    public function category(){
        return $this->hasOne(Category::class, 'category_id');
    }

}

