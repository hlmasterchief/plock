<?php

class UserAuthTest extends TestCase {

	public function setUp() {
		parent::setUp();
		$this->mock = Mockery::mock('App\User');
        $this->seed('UserTableSeeder');
	}

	public function tearDown() {
		parent::tearDown();
		Mockery::close();
	}

    public function test_authentication() {
        $cres = ['username'=>'test', 'password'=>'failpassword'];
        $this->assertFalse(Auth::attempt($cres));
        $cres['password'] = 'test';
        $this->assertTrue(Auth::attempt($cres));
    }

    public function test_login() {

    }

}
