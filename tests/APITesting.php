<?php

use Faker\Factory as Faker;


class APITesting extends TestCase{

  protected $faker;


  public function __construct(){
    $this->faker = Faker::create();
  }



}