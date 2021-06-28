<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Reply extends BaseModel
{
    use HasFactory;

    public function user(){
       return $this->belongsTo(User::class, 'user_id');
    } 

    public function discussion(){
        return $this->belongsTo(Discusion::class, 'discussion_id');
    }
}
