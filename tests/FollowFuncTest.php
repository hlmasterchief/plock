<?php

class FollowFuncTest extends TestCase {

    public function setUp() {
        parent::setUp();
        $this->seed('UserTestSeeder');
    }

    /**
     * @test
     */
    public function test_follow_each_other() {
        $follow_input = [
            'follower_id'  => 1,
            'followee_id'  => 2,
        ];

        // follow test
        $response = $this->action('POST', 'UserController@postToggleFollow', [], $follow_input);
        $result   = $response->getData();

        $this->assertTrue($result->is_follow);

        $user1 = App\Models\User::find(1);
        $this->call('GET', "/$user1->username/followings");
        $this->assertResponseOk();
        $this->assertViewHas('followings');

        // then unfollow test
        $response = $this->action('POST', 'UserController@postToggleFollow', [], $follow_input);
        $result   = $response->getData();

        $this->assertFalse($result->is_follow);
    }

}