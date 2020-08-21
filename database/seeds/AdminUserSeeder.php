<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin@123'),
            'admin' => true,
            'active' => true,
        ]);
    }
}
