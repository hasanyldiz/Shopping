<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $fillable=['name', 'surname', 'adress', 'message', 'user_id', 'total_price'];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
