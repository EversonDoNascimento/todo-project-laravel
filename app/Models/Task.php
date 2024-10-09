<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $table = "tasks";
    public $filable = [
        "title",
        "description",
        "duo_date",
        "user_id",
        "category_id"
    ];
    public $hidden = [
        "user_id",
        "category_id"
    ];
    use HasFactory;
}
