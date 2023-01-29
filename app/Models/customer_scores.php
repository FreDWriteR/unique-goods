<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orders;

class customer_scores extends Model
{
    use HasFactory;
    
    public function tasks()
    {
        return $this->hasMany(orders::class);
    }
}
