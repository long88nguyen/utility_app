<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;

class Member extends Model
{
    use HasFactory,Filterable;

    protected $fillable = ['id','user_id','name','gender','birthday'];

    public function books(){
        return $this->hasMany(Book::class,'member_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
