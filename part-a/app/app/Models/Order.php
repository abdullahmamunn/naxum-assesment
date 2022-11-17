<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   public function purchaser()
   {
      return $this->belongsTo(User::class,'purchaser_id');
   }

   public function items()
   {
      return $this->hasMany(OrderItem::class);
   }
}
