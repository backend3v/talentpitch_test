<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //use HasFactory;
    public function participants() 
    {
        
        return $this->hasMany(Program_participants::class,"program", "id");
    }
    protected $fillable = [
        'name',
        'date', 
        'location',
        'frequency',
        'description'
    ];
}
