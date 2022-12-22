<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'product_media';
    public const UPDATED_AT = 'modified_at';
    protected $primaryKey = 'media_id';
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
