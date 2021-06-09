<?php

use App\Lecturer;
use App\Profile;
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
            'name' => 'Akun Admin',
            'email' => 'admin@role.test',
            'password' => bcrypt('12345678')
        ]);

        $profile = Profile::create([
            'users_id' => $admin->id,
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Akun Operator',
            'email' => 'operator@role.test',
            'password' => bcrypt('12345678')
        ]);

        $profile = Profile::create([
            'users_id' => $user->id,
        ]);

        $user->assignRole('operator');

        $dosen = User::create([
            'name' => 'Akun Dosen',
            'email' => 'dosen@role.test',
            'password' => bcrypt('12345678')
        ]);


        $lecturer = Lecturer::create([
            'users_id' => $user->id,
        ]);

        $profile = Profile::create([
            'users_id' => $dosen->id,
        ]);

        $dosen->assignRole('dosen');
    }
}