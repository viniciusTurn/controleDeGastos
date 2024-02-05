<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [        
        "description"
    ];
    
    public function productsEntries()
    {
        return $this->hasMany(ProductsEntry::class, 'product_id');
    }
}
