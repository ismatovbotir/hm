<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;


class Partner extends Model
{
    use HasFactory;
    public $guarded=[];

    public function items(){
        return $this->hasMany(Item::class);

    }
}
