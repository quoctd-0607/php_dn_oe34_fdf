<?php

namespace Tests\Unit\Model;

use App\Model\Role;
use App\Model\User;
use Illuminate\Support\Collection;
use Tests\TestCase;

class RoleTest extends TestCase
{
    protected $role;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->role = Role::firstOrCreate(['name' => 'Testing'], [
            'name' => 'Testing',
        ]);
    }

    public function test_contains_valid_fillable_properties()
    {
        $role = $this->role;

        $this->assertEquals(['name'], $role->getFillable());
    }

    public function test_role_has_many_users()
    {
        $role = $this->role;

        $user = User::firstOrCreate(['role_id' => $role->id], [
            'full_name' => 'Testing',
            'username' => 'Testing',
            'email' => 'testing@gmail.com',
            'password' => 'testing',
            'phone_number' => 1234567890,
            'role_id' => $role->id,
            'verify_at' => null,
        ]);

        $this->assertTrue($role->users->contains($user));
        $this->assertInstanceOf(Collection::class, $role->users);
    }
}
