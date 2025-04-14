<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->name = 'Admin';
        $usuario->email = 'admin@example.com';
        $usuario->password = bcrypt('admin');
        $usuario->save();
    }
}
