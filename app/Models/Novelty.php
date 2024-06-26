<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novelty extends Model
{
    use HasFactory;

    protected $fillable=[
        "hour",
        "novelty",
        "user_id",
        "created_by",
        "updated_by",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
