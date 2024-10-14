<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "categories";
    protected $filable = [
        "title",
        "color",
        "user_id"
    ];
    // protected $hidden = [
    //     "user_id"
    // ];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, "id", "user_id");        
    }
}
