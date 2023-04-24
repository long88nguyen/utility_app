<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;

class Book extends Model
{
    use HasFactory,Filterable;

    protected $fillable = ['member_id','name','author'];
}
