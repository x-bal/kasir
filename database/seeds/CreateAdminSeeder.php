<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'tzuyu',
            'nama' => 'Muhammad Iqbal',
            'jk' => 'Laki-Laki',
            'alamat' => 'Kp.Cikeler',
            'telp' => '082114823280',
            'password' => bcrypt('password'),
            'level' => 'admin'
        ]);
    }
}
