<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customer_scores;

class orders extends Model
{
    use HasFactory;
    
    public function user() 
    {
        return $this->belongsTo(customer_scores::class);
    }
}
