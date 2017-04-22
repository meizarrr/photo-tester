<?php

use Illuminate\Database\Seeder;
use App\Admin;

class FrontDeskSeeder extends Seeder
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
    }
}
