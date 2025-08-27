<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\Category;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }

    public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}
    //win fama cle etrangers nhot l belongsto et lautre hasmany
}
