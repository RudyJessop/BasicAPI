<?php
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            User::create([
              'email' => $faker->email,
              'username' => $faker->username,
              'password' => password_hash('password', PASSWORD_BCRYPT),
            ]);
        }

    }


}
