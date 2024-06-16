<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function collections(){
        return $this->belongsToMany(Collection::class);
    }
    public function table(){
        return $this->belongsTo(Table::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
