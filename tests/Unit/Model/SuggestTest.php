<?php

namespace Tests\Unit\Model;

use App\Model\Suggest;
use App\Model\User;
use Tests\TestCase;

class SuggestTest extends TestCase
{
    protected $suggest;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->suggest = Suggest::firstOrCreate(['suggest' => 'Testing'], [
            'suggest' => 'Testing',
            'user_id' => 1,
            'status' => 1,
        ]);
    }

    public function test_contains_valid_fillable_properties()
    {
        $suggest = $this->suggest;

        $this->assertEquals([
            'suggest',
            'status',
            'user_id',
        ], $suggest->getFillable());
    }

    public function test_suggest_belong_to_user()
    {
        $suggest = $this->suggest;

        $this->assertInstanceOf(User::class, $suggest->user);
    }
}
