<?php

use App\User;
use CTL\JWTBase;


class JWTtokenTest extends APITesting{

  /**
   * Test JWT Token Creation
   * @return [type] [description]
   */
  public function test_token_creation(){
    $jwt = new JWTBase;
    $token = $this->userDetailedToken();

    $this->assertTrue(isset($token));
  }

  /**
   * Test Token Validation
   * @return [type] [description]
   */
  public function test_token_validation(){
    $jwt = new JWTBase;
    $token = $this->createToken();

    $this->assertTrue($jwt->validateJWTtoken($token) );
  }

  /**
   * Creating JWT Token
   * @return [type] [description]
   */
  private function createToken(){
    $jwt = new JWTBase;

    return $jwt->buildJWTtoken(1, $this->userDetailedToken() );
  }

  /**
   * Creating User Info
   * @return [type] [description]
   */
  private function userDetailedToken(){

    $user = array_merge([
      'username' => $this->faker->username,
      'email' => $this->faker->email
    ]);

    return $user;
  }

}