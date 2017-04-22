<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use App\Peserta;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
	        'name' => "frontdesk",
	        'email' => "fo@test.com",
	        'password' => bcrypt("fo")
      	]);

        DB::table('users')->insert([
                [
                    'name' => 'juri1',
                    'email' => 'juri1@test.com',
                    'password' => bcrypt('juri1')
                ],
                [
                    'name' => 'juri2',
                    'email' => 'juri2@test.com',
                    'password' => bcrypt('juri2')
                ],
                [
                    'name' => 'juri3',
                    'email' => 'juri3@test.com',
                    'password' => bcrypt('juri3')
                ]
        ]);

        DB::table('pesertas')->insert([
                [
                    'name' => 'peserta1',
                    'nomor_peserta' => '11111'
                ],
                [
                    'name' => 'peserta2',
                    'nomor_peserta' => '22222'
                ],
                [
                    'name' => 'peserta3',
                    'nomor_peserta' => '33333'
                ]
        ]);
    }
}
