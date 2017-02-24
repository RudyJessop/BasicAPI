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
        $this->cleanDatabase();
        $this->call(UserSeeder::class);
    }

    private function cleanDatabase(){
      DB::statement('SET FOREIGN_KEY_CHECKS=0');

      foreach($this->tables as $table){
        DB::table($table)->truncate();
      }
      DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
