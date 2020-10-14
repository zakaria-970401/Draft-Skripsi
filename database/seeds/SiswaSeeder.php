<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\User;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nama_siswa' => 'Ahmad Zakaria',
            'nisn' => 0,
            'email' => 'ada@gmail.com',
            'password' => bcrypt('adaada'),
            'foto' => '',
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'nama_siswa' => 'Novi Damayanti',
            'nisn' => 112233,
            'email' => 'novi@gmail.com',
            'password' => bcrypt('adaada'),
            'foto' => '',
        ]);

        $admin->assignRole('user');
    }
}
