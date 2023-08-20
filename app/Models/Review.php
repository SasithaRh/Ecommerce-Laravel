<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table="reviews";
    use HasFactory;

    public function orderItem()
    {
       return $this->belongsTo(OrderItem::class);
       
    }
}
