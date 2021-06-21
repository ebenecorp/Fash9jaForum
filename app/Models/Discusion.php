<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discusion extends BaseModel
{
    use HasFactory;

    public function author(){
        
        return $this->belongsTo(User::class, 'user_id' );
    }
}
