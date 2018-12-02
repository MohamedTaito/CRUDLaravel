<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('user')->insert([
          'id' => 1,
          'email' => 'admin@company.comm',
          'password' => 'password',
      ]);
    }
}
