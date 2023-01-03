<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'product_inventory';
    public const UPDATED_AT = 'modified_at';
    protected $primaryKey = 'inventory_id';
    protected $hidden = ['created_at', 'modified_at'];
    protected $fillable = ['quantity'];

    public function product(){
        return $this->hasOne(Product::class, 'inventory_id', 'inventory_id');
    }
}

// protected $table = 'master_posts';    
// public const CREATED_AT = 'created_timestamp';
// public const UPDATED_AT = 'updated_timestamp';    
// protected $primaryKey = 'pid';