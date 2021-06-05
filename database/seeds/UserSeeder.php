<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Role',
            'email' => 'admin@role.test',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Operator Role',
            'email' => 'operator@role.test',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('operator');

        $user = User::create([
            'name' => 'Dosen Role',
            'email' => 'dosen@role.test',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('dosen');
    }
}