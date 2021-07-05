<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discusion extends BaseModel
{
    use HasFactory;

    public function author(){
        
        return $this->belongsTo(User::class, 'user_id' );
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function replies(){
        return $this->hasMany(Reply::class , 'discussion_id');
    }

    public function bestReply(){
        return $this->belongsTo(Reply::class, 'reply_id');
    }

    public function markBestReply(Reply $reply){
        $this->update([
                'reply_id' => $reply->id
        ]);
    }
}
