<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'product_category';
    public const UPDATED_AT = 'modified_at';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name', 'category_description'];
    protected $hidden = ['created_at', 'modified_at'];


    public function product(){
        return $this->belongsTo(Product::class);
    }

}
