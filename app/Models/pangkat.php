<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pangkat extends Model
{
    use HasFactory;

    protected $table="pangkats";


    protected $fillable = [
        'name',
    ];

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
