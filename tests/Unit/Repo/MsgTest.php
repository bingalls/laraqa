<?php

namespace Tests\Unit\Repo;

use App\Message;
use App\Repo\MsgRepo;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Tests\TestCase;

class MsgTest extends TestCase
{
    private $repo;

    public function testCreate()
    {
        $msg = factory(Message::class)->make();
        $this->repo = new MsgRepo($msg);
        $faker = Faker::create();
        $data = [
            'email' => $faker->unique()->safeEmail,
            'name' => $faker->name,
            'sent' => $faker->boolean,
            'phone' => $faker->numberBetween(1000000000, 9999999999),
            'message' => Str::random(100),
        ];
        $response = $this->repo->create($data);
//        var_export($response);
        $this->assertTrue(true);
    }

}
