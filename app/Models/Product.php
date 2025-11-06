<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Product';

    protected $fillable = ['name', 'description', 'price', 'image', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
