<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

  protected $tables = ['users'];

  protected $seeders = ['UserSeeder'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
    }

}
