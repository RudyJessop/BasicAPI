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
        // Can Use this for singular seeder
        $this->call(UserSeeder::class);

        // Once application gets complex use this foreach
        // foreach($this->seeders as $seedClasses){
        //     $this->call($seedClasses);
        // }
    }

}
