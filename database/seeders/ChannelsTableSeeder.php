<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Channel::create([
            'name' => 'Men Fashion',
            'slug'=> Str::slug('Men Fashion'),
            'description'=> "This is a channel for trending men fashion discussions"
        ]);


        Channel::create([
            'name' => 'Women Fashion',
            'slug'=> Str::slug('Women Fashion'),
            'description'=> "This is a channel for trending Women fashion discussions"
        ]);


        Channel::create([
            'name' => 'Events and Occasions ',
            'slug'=> Str::slug('Events and Occasions'),
            'description'=> "This is a channel for trending Events and Occasions discussions"
        ]);


        Channel::create([
            'name' => 'Celebrity Gossips',
            'slug'=> Str::slug('Celebrity Gossips'),
            'description'=> "This is a channel for trending Celebrity Gossips and discussions"
        ]);
        
    }
}
