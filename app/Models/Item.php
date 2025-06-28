<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sell;

class Item extends Model
{
    use HasFactory;
    public $guarded=[];
   
   
    public function sells(){
        
        return $this->hasMany(Sell::class, 'item_id');
    }
}
