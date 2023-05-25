<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $fillable = ['name','building','user_id'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function items() {
        return $this->hasMany('App\Models\Item');
    }
}
