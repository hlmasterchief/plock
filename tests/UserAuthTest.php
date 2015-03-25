<?php

class UserAuthTest extends TestCase {

	public function setUp() {
		parent::setUp();
        $this->user = $this->mock('App\User');
        $this->auth = $this->mock('Illuminate\Auth\AuthManager');
        $this->view = $this->mock('Illuminate\View\Factory');
	}

	public function tearDown() {
		parent::tearDown();
		Mockery::close();
	}

    /**
     * @test
     */
    public function it_shows_the_login_form() {
        $this->view->shouldReceive('make')->once();
        $response = $this->call('GET', '/login');
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function it_redirects_back_to_form_if_login_fail() {
        $credentials = [
            'username'  => 'test',
            'password'  => 'test',
        ];

        $this->auth->shouldReceive('attempt')
                    ->once()
                    ->with($credentials)
                    ->andReturn(false);

        $this->call('POST', '/login', $credentials);

        $this->assertRedirectedToAction(
            'AuthenticationController@getLogin',
            [],
            ['flash_message']
        );
    }

    /**
     * @test
     */
    public function it_redirects_back_to_form_if_login_success() {
        $credentials = [
            'username'  => 'test',
            'password'  => 'test',
        ];

        $this->auth->shouldReceive('attempt')
                    ->once()
                    ->with($credentials)
                    ->andReturn(true);

        Redirect::shouldReceive('back')->once();

        $this->call('POST', '/login', $credentials);
    }

}
