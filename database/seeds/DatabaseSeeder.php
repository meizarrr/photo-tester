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

        DB::table('users')->insert([
                [
                    'name' => 'juri4',
                    'email' => 'juri4@test.com',
                    'password' => bcrypt('juri4')
                ],
                [
                    'name' => 'juri5',
                    'email' => 'juri5@test.com',
                    'password' => bcrypt('juri5')
                ],
                [
                    'name' => 'juri6',
                    'email' => 'juri6@test.com',
                    'password' => bcrypt('juri6')
                ],
                [
                    'name' => 'juri7',
                    'email' => 'juri7@test.com',
                    'password' => bcrypt('juri7')
                ],
                [
                    'name' => 'juri8',
                    'email' => 'juri8@test.com',
                    'password' => bcrypt('juri8')
                ],
        ]);
    }
}
