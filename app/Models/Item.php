<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sell;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Partner;

class Item extends Model
{
    use HasFactory;
    public $guarded=[];
   
   
    public function sells(){
        
        return $this->hasMany(Sell::class, 'item_id');
    }

    public function stock(){
        return $this->hasMany(Stock::class,'item_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function partner(){
        return $this->belongsTo(Partner::class);
    }
}
