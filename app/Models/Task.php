<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $table = "tasks";
    protected $fillable = ["title","description","is_done","duo_date","user_id","category_id"];
    // protected $hidden = [
    //     "user_id",
    //     "category_id"
    // ];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, "id", "user_id");
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
