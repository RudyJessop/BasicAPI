<?php

use App\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserAPITest extends APITesting
{

    /**
     * Testing All Users Responses
     *
     */
    public function test_fetching_all_users()
    {
        $this->makeUser();

        $this->json('GET', 'api/v1/users');

        $this->assertResponseOk();

    }

    /**
     * Testing Single User Responses
     */
    public function test_fetching_one_user(){
        $this->makeUser();

        $this->json('GET', 'api/v1/users/1');

        $this->assertResponseOk();
    }

    /**
     * Testing 404 responses
     */
    public function test_fetching_user_not_found(){
        $this->json('GET', 'api/v1/users/200');

        $this->assertResponseStatus(404);
    }


    /**
     * Creating Mock Users
     * @param  array  $userAtt [description]
     * @return [type]          [description]
     */
    private function makeUser($userAtt = []){
        $user = array_merge([
            'username' =>   $this->faker->username,
            'email' => $this->faker->email
        ], $userAtt);

        User::create($user);
    }

}

