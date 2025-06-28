<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Shop;

class Stock extends Model
{
    use HasFactory;
    public $guarded=[];
    public $timestamps = false;
    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
