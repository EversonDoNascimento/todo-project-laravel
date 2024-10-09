<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "categories";
    public $filable = [
        "title",
        "color",
        "user_id"
    ];
    public $hidden = [
        "user_id"
    ];
    use HasFactory;
}
