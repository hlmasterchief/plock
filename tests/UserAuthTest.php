<?php

class UserAuthTest extends TestCase {

	public function setUp() {
		parent::setUp();
        $this->user = Mockery::mock('\App\User');
        $this->view = Mockery::mock('Illuminate\View\Factory');
        $this->seed('UserTestSeeder');
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
        $this->app->instance('Illuminate\View\Factory', $this->view);
        $response = $this->call('GET', '/login');
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function it_redirects_back_to_form_if_login_fail() {
        $credentials = [
            'email'     => 'test@gmail.com',
            'password'  => 'failpassword',
        ];

        Auth::shouldReceive('attempt')
                ->once()
                ->with($credentials)
                ->andReturn(false);

        $this->call('POST', '/login', $credentials);

        $this->assertRedirectedTo(
            'login',
            [],
            ['message']
        );
    }

    /**
     * @test
     */
    public function it_redirects_back_to_form_if_login_success() {
        $credentials = [
            'email'     => 'test@gmail.com',
            'password'  => 'test',
        ];

        Auth::shouldReceive('attempt')
                ->once()
                ->with($credentials)
                ->andReturn(true);

        $this->call('POST', '/login', $credentials);
    }

}
