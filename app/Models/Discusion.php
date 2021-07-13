<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Notifications\ReplyMarkAsBestReply;

class Discusion extends BaseModel
{
    use HasFactory;

    public function author(){
        
        return $this->belongsTo(User::class, 'user_id' );
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function scopeFilterByChannels($builder){
        if(request()->query('channel')){
            $channel = Channel::where('slug', request()->query('channel'))->first();

            if($channel){
                return $builder->where('channel_id', $channel->id);
            }
        }

        return $builder;
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

        if($reply->user->id === $this->author->id){
            return;
        }

        $reply->user->notify(new ReplyMarkAsBestReply($reply->discussion));
    }
}
