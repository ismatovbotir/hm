<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    public $guarded=[];
    public function stocks($date){
        return $this->hasMany(Stock::class)->where('stock_date',$date);
    }
    public function stock($date,$id){
        return $this->hasMany(Stock::class)->where('stock_date',$date)->where('shop_id',$id);
    }
}
