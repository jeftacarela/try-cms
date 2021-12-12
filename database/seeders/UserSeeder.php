<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = 'Carela';
        $user->email = 'carela@gmail.com';
        $user->password = Hash::make('232427');
        $user->role = 'A';
        $user->email_verified_at = now();

        $user->save();

        $user2 = new User();

        $user2->name = 'Johanes';
        $user2->email = 'johanes@gmail.com';
        $user2->password = Hash::make('232427');
        $user2->role = 'B';
        $user2->email_verified_at = now();

        $user2->save();

        $user3 = new User();

        $user3->name = 'Jefta';
        $user3->email = 'jefta@gmail.com';
        $user3->password = Hash::make('232427');
        $user3->role = 'C';
        $user3->email_verified_at = now();

        $user3->save();
    }
}
