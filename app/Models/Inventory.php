<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = "product_inventory";
    public const UPDATED_AT = "modified_at";
    protected $primaryKey = "inventory_id";
    protected $hidden = ["created_at", "modified_at"];
    protected $fillable = ["quantity"];

    public function product()
    {
        return $this->belongsTo(Product::class, "inventory_id");
    }
}
