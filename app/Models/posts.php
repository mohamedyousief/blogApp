<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function image(){
        if ($this->image){
            return asset('storage/' . $this->image);
        }else{
            return asset('defult.png');
        }
    }
}
