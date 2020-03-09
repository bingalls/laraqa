<?php

namespace Tests\Unit\Repo;

use App\Message;
use App\Repo\MsgRepo;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class MsgTest extends TestCase
{
    use RefreshDatabase;

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
        $this->assertEquals(302, $response->getStatusCode());
    }

    /**
     * Not allowing phone ()-x which are in faker->phoneNumber
     */
    public function testInvalidPhoneBeyondNumbers()
    {
        $msg = factory(Message::class)->make();
        $this->repo = new MsgRepo($msg);
        $faker = Faker::create();
        $data = [
            'email' => $faker->unique()->safeEmail,
            'name' => $faker->name,
            'sent' => $faker->boolean,
            'phone' => $faker->phoneNumber,
            'message' => Str::random(100),
        ];
        $response = $this->repo->create($data);
        $this->assertEquals(400, $response->getStatusCode());
    }

    public function testPhoneNotRequired()
    {
        $msg = factory(Message::class)->make();
        $this->repo = new MsgRepo($msg);
        $faker = Faker::create();
        $data = [
            'email' => $faker->unique()->safeEmail,
            'name' => $faker->name,
            'sent' => $faker->boolean,
            'message' => Str::random(100),
        ];
        $response = $this->repo->create($data);
        $this->assertEquals(302, $response->getStatusCode());
    }

}
