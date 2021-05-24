<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'special'=>'all-access',
        ]);

        $user = User::create([
            'name'=>'Agustin Guanipa',
            'email'=>'agustin_guanipa@hotmail.com',
            'password'=>'$2y$10$EZv099PrpxXUFfa/vadcFOlSec98pRQClV7txH19G6p9GrSkdzE8u',
        ]);
        
        $user->roles()->sync(1);
        
    }
}
