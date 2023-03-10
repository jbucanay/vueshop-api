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
    protected $hidden = ['created_at', 'modified_at'];
    protected $fillable = ['discount_name', 'discount_discription', 'discount_percent', 'active_state'];


    public function product(){
        return $this->belongsTo(Product::class);
    }

}
