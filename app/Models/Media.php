<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'product_media';
    protected $hidden = ['created_at', 'modified_at'];
    public const UPDATED_AT = 'modified_at';
    protected $primaryKey = 'media_id';
    protected $fillable = ['media_name', 'media_link', 'media_type'];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
