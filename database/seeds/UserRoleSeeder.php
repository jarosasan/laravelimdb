<?php

use Illuminate\Database\Seeder;
use App\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $user = new User();
	    $user->name = 'Jarka';
	    $user->email = 'jarka@jarka.lt';
	    $user->role = 'admin';
	    $user->password = bcrypt('jarka');
	    $user->save();
    }
}
