<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_name',
        'cat_color',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
