<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemListname;

// class ItemListname extends Model
// {
//     use HasFactory;

//     public $timestamps = false;
//     public function item()
//     {
//         return $this->hasMany(Item::class);
//     }
// }
class Item extends Model
{
    use HasFactory;

    public function itemListnames()
    {
        return $this->hasMany(ItemListname::class);
    }
}
