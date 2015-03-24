<?php

class UserAuthTest extends TestCase {

	public function setUp() {
		parent::setUp();
		$this->mock = Mockery::mock('App\User2');
	}

	public function tearDown() {
		parent::tearDown();
		Mockery::close();
	}

	public function test_mock() {
		$this->mock->shouldReceive('all')->once();
		$this->app->instance('User', $this->mock);
		$this->call('GET', 'users');
		$this->assertResponseOk();
	}

}
