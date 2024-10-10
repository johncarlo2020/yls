<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Station;
use App\Models\Regime;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Station::create([
            'name' => 'LIBRE FRAGRANCE & MAKE-UP DISCOVERY',
            'description' => 'Experience the new LIBRE Flowers & Flames and discover the world of YSL Beauty make-up ',
        ]);

        Station::create([
            'name' => 'ICONS ARE FOREVER',
            'description' => 'Explore LIBRE & MYSLF in refill form and indulge in a scent made to last a lifetime',
        ]);

        Station::create([
            'name' => 'MYSLF FRAGRANCE DISCOVERY',
            'description' => 'Encounter MYSLF Le Parfum, a new sensual and addictive scent, for a man born unapologetically himself',
        ]);

        Station::create([
            'name' => 'MYSLFIE MANIFESTO',
            'description' => 'Strike a pose and share your photo on social media using the hashtags: #YSLBeautyMY #YSLFragrance #BorntobeIconic',
        ]);

        Station::create([
            'name' => 'CONGRATULATIONS!',
            'description' => "You've completed the 'Born to be Iconic' fragrance experience. Seize your exclusive gift at the gift redemption counter",
        ]);
        $role = Role::create(['name' => 'client']);

        $role = Role::create(['name' => 'admin']);

        $user = User::create([
            'code' => '0000000000000',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('WowsomeYsl'),
        ]);

        $user->assignRole('admin');
    }
}
