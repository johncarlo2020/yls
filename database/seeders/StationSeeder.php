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
            'description' => 'Experience the heat of a flower and the sensuality of a flame in the new Libre Flowers & Flames and discover the world of YSL beauty makeup.',
        ]);

        Station::create([
            'name' => 'BORN TO BE ICONIC',
            'description' => 'Explore the iconic scents of LIBRE & MYSLF in refill form and indulge in a sensorial journey made to last a lifetime.',
        ]);

        Station::create([
            'name' => 'MYSLF FRAGRANCE DISCOVERY',
            'description' => 'Encounter MYSLF Le Parfum, a woody floral statement enhanced by velvety vanilla, for a new sensual ambery trail.',
        ]);

        Station::create([
            'name' => 'MYSELFIE MANIFESTO',
            'description' => 'Strike a pose and be unapologetically yourself.',
        ]);

        Station::create([
            'name' => 'CONGRATULATIONS!',
            'description' => "You've completed the 'Born to be Iconic' fragrance experience. Seize your exclusive gift at the gift redemption counter.",
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
