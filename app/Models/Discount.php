<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'product_discount';
    protected $primaryKey = 'discount_id';
    public const UPDATED_AT = 'modified_at';

    public function product(){
        return $this->hasOne(Product::class, 'discount_id', 'discount_id');
    }

}
