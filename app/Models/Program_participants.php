<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_participants extends Model
{
    use HasFactory;
    protected $fillable = [
        'participant',
        'type',
        'program'
    ];
    public function user() 
    {
        switch ($this->type) {
            case "user":
                return $this->hasMany(User::class,"id", "participant");
                break;
            case "company":
                return $this->hasMany(Company::class,"id", "participant");
                break;
            case "challenge":
                return $this->hasMany(Challenge::class,"id", "participant");
                break;
            default:
                return NULL;
        }

        
    }

}
