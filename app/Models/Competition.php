<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = "Competitions";
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function winners(){
        return $this->belongsToMany(user::class,'competition_winners');
    }
}
