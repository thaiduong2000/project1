<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    use HasFactory;
    
    protected $table = 'technologies';

    protected $fillable = [
        'name',
    ];

    public function vehicles(){

        return $this->hasMany(Vehicles::class);
    }
}
