<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicComponentGroups extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateComponentGroup()
    {
        // given we have a user
        $user = User::findOrFail(1);

        // who does a request to create a new component group
        $data = [
            'component_groups_name' => 'MyGroupName1',
            'visibility_group' => 1,
            'status' => 1,
        ];

        $response = $this->actingAs($user)
            ->ajaxPost(route('authenticated.components.groups.new.store'), $data);

        // then we should see the data in database
        $this->assertDatabaseHas('component_groups', $data);

        // as well as see the entry in index page of component groups
        $this->actingAs($user)
            ->ajaxGet(route('authenticated.components.groups'))
            ->assertSee($data['component_groups_name']);
    }
}
