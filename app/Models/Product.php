<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'name', 'description', 'price', 'stock', 'image'
    ];

    /**
     * Boot the model to automatically generate product_id before creation.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            // Check if product_id already exists and generate a new one
            if (empty($product->product_id)) {
                // Get the last product to determine the next product_id
                $lastProduct = Product::latest()->first();
                $lastId = $lastProduct ? (int) substr($lastProduct->product_id, 7) : 0; // Get the number part of the last product_id
                
                // Generate the next product_id
                $product->product_id = 'PRODUCT' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
