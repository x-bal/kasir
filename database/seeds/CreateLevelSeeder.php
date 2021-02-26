<?php

use App\Level;
use Illuminate\Database\Seeder;

class CreateLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'level' => 'admin'
        ]);
        Level::create([
            'level' => 'karyawan'
        ]);
    }
}
